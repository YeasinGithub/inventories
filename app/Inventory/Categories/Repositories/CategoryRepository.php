<?php

namespace App\Inventory\Categories\Repositories;

//use App\Inventory\Tools;
use Jsdecena\Baserepo\BaseRepository;
use App\Inventory\Categories\Category;
use App\Inventory\Categories\Exceptions\CategoryInvalidArgumentException;
use App\Inventory\Categories\Exceptions\CategoryCreateErrorException;
use App\Inventory\Categories\Exceptions\CategoryNotFoundException;
// use App\Inventory\Categories\Exceptions\CategoryUpdateErrorException;
use App\Inventory\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
// use App\Inventory\Products\Product;
// use App\Inventory\Products\Transformations\ProductTransformable;
// use App\Inventory\Tools\UploadableTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use App\Inventory\Tools\UploadableTrait;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{

    use UploadableTrait;

    // use UploadableTrait, ProductTransformable;


    /**
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        parent::__construct($category);
        $this->model = $category;
    }

    /**
     * List all the categories
     *
     * @param string $order
     * @param string $sort
     * @param array $except
     * @return \Illuminate\Support\Collection
     */
    public function listCategories(string $order = 'id', $except = []) : Collection
    {
        return $this->model
                        ->orderBy($order)
                        ->get()->except($except);
    }


    /**
     * List all root categories
     * 
     * @param  string $order 
     * @param  string $sort  
     * @param  array  $except
     * @return \Illuminate\Support\Collection  
     */


    public function rootCategories(string $order = 'id', $except = []) : Collection
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
    public function createCategory(array $params) : Category
    {
        try {

            $collection = collect($params);
            if (isset($params['name'])) {
                $slug = ($params['name']);
            }
            if (isset($params['image']) && ($params['image'] instanceof UploadedFile)) {
                $cover = $this->uploadOne($params['image'], 'categories');
                $image=$params['image']->getClientOriginalName();
            }

            $merge = $collection->merge(compact('slug','cover', 'image'));

            $category = new Category($merge->all());

            $category->save();
            return $category;
        
        } catch (QueryException $e) {
            throw new CategoryCreateErrorException($e->getMessage());
        }
    }

   

    /**
     * @param int $id
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function findCategoryById(int $id) : Category
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
    public function updateCategory(array $params) : Category
    {  
        $category = $this->findCategoryById($this->model->id);
        $collection = collect($params)->except('_token');
        $slug = ($collection->get('name'));

        

        $merge = $collection->merge(compact('slug'));

        // set parent attribute default value if not set
        $params['parent'] = $params['parent'] ?? 0;

        // If parent category is not set on update
        // just make current category as root
        // else we need to find the parent
        // and associate it as child
        if ( (int)$params['parent'] == 0) {
            $category->save();
        } else {
            $parent = $this->findCategoryById($params['id']);
            $category->parent()->associate($parent);
        }

        $category->update($merge->all());
        
        return $category;
    }

    /**
     * Delete a category
     *
     * @return bool
     * @throws \Exception
     */
    public function deleteCategory() : bool
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
