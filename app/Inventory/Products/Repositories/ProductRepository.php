<?php

namespace App\Inventory\Products\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Inventory\Products\Product;
use App\Inventory\Products\Exceptions\ProductNotFoundException;
//use App\Inventory\Products\Exceptions\ProductInvalidArgumentException;
use App\Inventory\Products\Exceptions\ProductCreateErrorException;

use App\Inventory\Products\Repositories\Interfaces\ProductRepositoryInterface;
// use App\Inventory\Products\Product;
// use App\Inventory\Products\Transformations\ProductTransformable;
// use App\Inventory\Tools\UploadableTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use App\Inventory\Tools\UploadableTrait;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
     use UploadableTrait;

    /**
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(Product $product)
    {
        parent::__construct($product);
        $this->model = $product;
    }

    /**
     * List all the categories
     *
     * @param string $order
     * @param string $sort
     * @param array $except
     * @return \Illuminate\Support\Collection
     */
    public function listProducts(string $order = 'id', $except = []) : Collection
    {
        return $this->model
        //->with('category','Subcategory','SubSubcategory')
        ->orderBy($order)->get()->except($except);
    }

    /**
     * List all root categories
     * 
     * @param  string $order 
     * @param  string $sort  
     * @param  array  $except
     * @return \Illuminate\Support\Collection  
     */
    public function rootProducts(string $order = 'id', $except = []) : Collection
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
    public function createProduct(array $params) : Product
    {
        try {

            $collection = collect($params);
            if (isset($params['name'])) {
                $slug = ($params['name']);
            }
            if (isset($params['image']) && ($params['image'] instanceof UploadedFile)) {
                $cover = $this->uploadOne($params['image'], 'Subcategories');

                $image=$params['image']->getClientOriginalName();
            }

            $merge = $collection->merge(compact('slug','cover','image'));

            $category = new Product($merge->all());

            $category->save();
            return $category;
        
        } catch (QueryException $e) {
            throw new ProductCreateErrorException($e->getMessage());
        }
    }

   

    /**
     * @param int $id
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function findProductById(int $id) : Product
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new ProductNotFoundException($e->getMessage());
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
    public function updateProduct(array $params) : Product
    {  
        $product = $this->findProductById($this->model->id);
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
            $product->save();
        } else {
            $parent = $this->findProductById($params['id']);
            $product->parent()->associate($parent);
        }

        $product->update($merge->all());
        
        return $product;
    }

    /**
     * Delete a category
     *
     * @return bool
     * @throws \Exception
     */
    public function deleteProduct() : bool
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