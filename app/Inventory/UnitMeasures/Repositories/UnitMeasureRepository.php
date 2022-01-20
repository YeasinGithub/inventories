<?php

namespace App\Inventory\UnitMeasures\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Inventory\UnitMeasures\UnitMeasure;
// use App\Inventory\UnitMeasures\Exceptions\CategoryInvalidArgumentException;
// use App\Inventory\UnitMeasures\Exceptions\CategoryNotFoundException;
use App\Inventory\UnitMeasures\Repositories\Interfaces\UnitMeasureRepositoryInterface;
// use App\Inventory\Products\Product;
// use App\Inventory\Products\Transformations\ProductTransformable;
// use App\Inventory\Tools\UploadableTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use App\Inventory\Tools\UploadableTrait;


class UnitMeasureRepository extends BaseRepository implements UnitMeasureRepositoryInterface
{
     use UploadableTrait;

    /**
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(UnitMeasure $unitMeasure)
    {
        parent::__construct($unitMeasure);
        $this->model = $unitMeasure;
    }

    /**
     * List all the categories
     *
     * @param string $order
     * @param string $sort
     * @param array $except
     * @return \Illuminate\Support\Collection
     */
    public function listUnitMeasures(string $order = 'id',  $except = []) : Collection
    {
        return $this->model->orderBy($order)->get()->except($except);
    }

   

    /**
     * Create the category
     *
     * @param array $params
     *
     * @return Category
     * @throws CategoryInvalidArgumentException
     * @throws CategoryNotFoundException
     */
    public function rootUnitMeasures(string $order = 'id', $except = []) : Collection
    {
        return $this->model->where($order)
                        // ->orderBy($order)
                        ->get()
                        ->except($except);
    }

    /**
     * Create the category
     *
     * @param array $params
     *
     * @return Category
     * @throws CategoryInvalidArgumentException
     * @throws CategoryNotFoundException
     */
    public function createUnitMeasure(array $params) : UnitMeasure
    {
        try {

            $collection = collect($params);
            if (isset($params['name'])) {
                $slug =($params['name']);
            }

           

            $merge = $collection->merge(compact('slug'));

            $unitmeasure = new UnitMeasure($merge->all());

            /*if (isset($params['parent'])) {
                $parent = $this->findCategoryById($params['parent']);
                $category->parent()->associate($parent);
            }*/

            $unitmeasure->save();
            return $unitmeasure;
        } catch (QueryException $e) {
            throw new CategoryInvalidArgumentException($e->getMessage());
        }
    }

    public function findUnitMeasureById(int $id) : UnitMeasure
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new CategoryNotFoundException($e->getMessage());
        }
    }

    /**
     * Update the category
     *
     * @param array $params
     *
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function updateUnitMeasure(array $params) : UnitMeasure
    {
        $unitmeasure = $this->findUnitMeasureById($this->model->id);
        $collection = collect($params)->except('_token');
        $slug = ($collection->get('name'));

        /*if (isset($params['cover']) && ($params['cover'] instanceof UploadedFile)) {
            $cover = $this->uploadOne($params['cover'], 'categories');
        }*/

        $merge = $collection->merge(compact('slug'));

        // set parent attribute default value if not set
        $params['parent'] = $params['parent'] ?? 0;

        // If parent category is not set on update
        // just make current category as root
        // else we need to find the parent
        // and associate it as child
        /*if ( (int)$params['parent'] == 0) {
            $category->saveAsRoot();
        } else {
            $parent = $this->findCategoryById($params['parent']);
            $category->parent()->associate($parent);
        }*/

        $unitmeasure->update($merge->all());
        
        return $unitmeasure;
    }

    /**
     * @param int $id
     * @return Category
     * @throws CategoryNotFoundException
     */
    /*public function findUnitById(int $id) : Category
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new CategoryNotFoundException($e->getMessage());
        }
    }*/

    /**
     * Delete a category
     *
     * @return bool
     * @throws \Exception
     */
    public function deleteUnit() : bool
    {
        return $this->model->delete();
    }

    

    /**
     * Return all the products associated with the category
     *
     * @return mixed
     */
    public function findProducts() : Collection
    {
        return $this->model->products;
    }



}
