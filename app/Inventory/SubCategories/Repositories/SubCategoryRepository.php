<?php

namespace App\Inventory\SubCategories\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Inventory\SubCategories\SubCategory;
use App\Inventory\SubCategories\Exceptions\SubCategoryCreateErrorException;
//use App\Inventory\SubCategories\Exceptions\SubCategoryUpdateErrorException;
//use App\Inventory\SubCategories\Exceptions\SubCategoryInvalidArgumentException;
use App\Inventory\SubCategories\Exceptions\SubCategoryNotFoundException;
use App\Inventory\SubCategories\Repositories\Interfaces\SubCategoryRepositoryInterface;
// use App\Inventory\Products\Product;
// use App\Inventory\Products\Transformations\ProductTransformable;
// use App\Inventory\Tools\UploadableTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use App\Inventory\Tools\UploadableTrait;

class SubCategoryRepository extends BaseRepository implements SubCategoryRepositoryInterface
{
     use UploadableTrait;

    /**
     * CategoryRepository constructor.
     * @param SubCategory $subCategory
     */
    public function __construct(SubCategory $subCategory)
    {
        parent::__construct($subCategory);
        $this->model = $subCategory;
    }

    /**
     * List all the categories
     *
     * @param string $order
     * @param string $sort
     * @param array $except
     * @return \Illuminate\Support\Collection
     */
    public function listSubCategories(string $order = 'id',  $except = []) : Collection
    {
        return $this->model->with('category')->orderBy($order)->get()->except($except);
    }

   

    /**
     * Create the category
     *
     * @param array $params
     *
     * @return SubCategory
     * @throws CategoryInvalidArgumentException
     * @throws CategoryNotFoundException
     */
    public function rootSubCategories(string $order = 'id', $except = []) : Collection
    {
        return $this->model//->where($order)
                         ->orderBy($order)
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
    public function createSubCategory(array $params) : SubCategory
    {


        try {

            $collection = collect($params);
            if (isset($params['name'])) {
                $slug = ($params['name']);
            }
            if (isset($params['image']) && ($params['image'] instanceof UploadedFile)) {
                $cover = $this->uploadOne($params['image'], 'Subcategories');
                $image=$params['image']->getClientOriginalName();

                //$merge->image=$params['image']->getClientOriginalName();
            }

            $merge = $collection->merge(compact('slug','cover', 'image'));

            $category = new SubCategory($merge->all());

            $category->save();
            return $category;
        
        } catch (QueryException $e) {
            throw new SubCategoryCreateErrorException($e->getMessage());
        }
    }

   

    /**
     * @param int $id
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function findSubCategoryById(int $id) : SubCategory
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new SubCategoryNotFoundException($e->getMessage());
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
    public function updateSubCategory(array $params) : SubCategory
    {
        $subCategory = $this->findSubCategoryById($this->model->id);
        $collection = collect($params)->except('_token');
        $slug =($collection->get('name'));

        /*if (isset($params['image']) && ($params['image'] instanceof UploadedFile)) {
            $cover = $this->uploadOne($params['image'], 'Subcategories');
        }*/

        $merge = $collection->merge(compact('slug'));

        // set parent attribute default value if not set
        $params['parent'] = $params['parent'] ?? 0;

        // If parent category is not set on update
        // just make current category as root
        // else we need to find the parent
        // and associate it as child
        /*if ( (int)$params['parent'] == 0) {
            $subCategory->saveAsRoot();
        } else {
            $parent = $this->findSubCategoryById($params['parent']);
            $subCategory->parent()->associate($parent);
        }*/

        $subCategory->update($merge->all());
        
        return $subCategory;
    }

    /**
     * @param int $id
     * @return Category
     * @throws CategoryNotFoundException
     */
    /*public function findSubCategoryById(int $id) : SubCategory
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
    public function deleteSubCategory() : bool
    {
        return $this->model->delete();
    }

    




}
