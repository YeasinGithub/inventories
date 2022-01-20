<?php

namespace App\Inventory\SubSubCategories\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Inventory\SubSubCategories\SubSubCategory;

use App\Inventory\SubSubCategories\Exceptions\SubSubCategoryCreateErrorException;
//use App\Inventory\SubSubCategories\Exceptions\SubSubCategoryInvalidArgumentException;
use App\Inventory\SubSubCategories\Exceptions\SubSubCategoryNotFoundException;

use App\Inventory\SubSubCategories\Repositories\Interfaces\SubSubCategoryRepositoryInterface;
// use App\Inventory\Products\Product;
// use App\Inventory\Products\Transformations\ProductTransformable;
// use App\Inventory\Tools\UploadableTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use App\Inventory\Tools\UploadableTrait;


class SubSubCategoryRepository extends BaseRepository implements SubSubCategoryRepositoryInterface
{
    use UploadableTrait;

    /**
     * CategoryRepository constructor.
     * @param SubCategory $subCategory
     */
    public function __construct(SubSubCategory $subSubCategory)
    {
        parent::__construct($subSubCategory);
        $this->model = $subSubCategory;
    }

    /**
     * List all the categories
     *
     * @param string $order
     * @param string $sort
     * @param array $except
     * @return \Illuminate\Support\Collection
     */
    public function listSubSubCategories(string $order = 'id',  $except = []) : Collection
    {
        return $this->model->with('Subcategory')->orderBy($order)->get()->except($except);
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
    public function rootSubSubCategories(string $order = 'id', $except = []) : Collection
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
    public function createSubSubCategory(array $params) : SubSubCategory
    {
        try {

            $collection = collect($params);
            if (isset($params['name'])) {
                $slug = ($params['name']);
            }
            if (isset($params['image']) && ($params['image'] instanceof UploadedFile)) {
                $cover = $this->uploadOne($params['image'], 'SubSubcategories');
                
                $image=$params['image']->getClientOriginalName();
            }

            $merge = $collection->merge(compact('slug','cover', 'image'));

            $category = new SubSubCategory($merge->all());

            $category->save();
            return $category;
        
        } catch (QueryException $e) {
            throw new SubSubCategoryCreateErrorException($e->getMessage());
        }
    }

   

    /**
     * @param int $id
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function findSubSubCategoryById(int $id) : SubSubCategory
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new SubSubCategoryNotFoundException($e->getMessage());
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
    public function updateSubSubCategory(array $params) : SubSubCategory
    {
        $SubSubcategory = $this->findSubSubCategoryById($this->model->id);
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
            $parent = $this->findSubCategoryById($params['parent']);
            $category->parent()->associate($parent);
        }*/

        $SubSubcategory->update($merge->all());
        
        return $SubSubcategory;
    }

    /**
     * @param int $id
     * @return Category
     * @throws CategoryNotFoundException
     */
    /*public function findSubSubCategoryById(int $id) : SubSubCategory
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
    public function deleteSubSubCategory() : bool
    {
        return $this->model->delete();
    }

    




}
