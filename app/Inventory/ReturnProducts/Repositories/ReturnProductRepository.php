<?php

namespace App\Inventory\ReturnProducts\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Inventory\ReturnProducts\ReturnProduct;
// use App\Inventory\Categories\Exceptions\CategoryInvalidArgumentException;
// use App\Inventory\Categories\Exceptions\CategoryNotFoundException;
use App\Inventory\ReturnProducts\Repositories\Interfaces\ReturnProductRepositoryInterface;
// use App\Inventory\Products\Product;
// use App\Inventory\Products\Transformations\ProductTransformable;
// use App\Inventory\Tools\UploadableTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use App\Inventory\Tools\UploadableTrait;

class ReturnProductRepository extends BaseRepository implements ReturnProductRepositoryInterface
{
     use UploadableTrait;

    /**
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(ReturnProduct $returnproduct)
    {
        parent::__construct($returnproduct);
        $this->model = $returnproduct;
    }

    /**
     * List all the categories
     *
     * @param string $order
     * @param string $sort
     * @param array $except
     * @return \Illuminate\Support\Collection
     */
    public function listReturnProducts(string $order = 'id', $except = []) : Collection
    {
        return $this->model->orderBy($order)->get()->except($except);
    }

    /**
     * List all root categories
     * 
     * @param  string $order 
     * @param  string $sort  
     * @param  array  $except
     * @return \Illuminate\Support\Collection  
     */
    public function rootReturnProducts(string $order = 'id', $except = []) : Collection
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
    public function createReturnProduct(array $params) : ReturnProduct
    {
        try {

            $collection = collect($params);
            if (isset($params['return_date'])) {
                $slug = ($params['return_date']);
            }
            
            $merge = $collection->merge(compact('slug'));

            $returnproduct = new ReturnProduct($merge->all());

            $returnproduct->save();
            return $returnproduct;
        
        } catch (QueryException $e) {
            throw new CategoryInvalidArgumentException($e->getMessage());
        }
    }

   

    /**
     * @param int $id
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function findReturnProductById(int $id) : ReturnProduct
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
    public function updateReturnProduct(array $params) : ReturnProduct
    {  
        $ReturnProduct = $this->findReturnProductById($this->model->id);
        $collection = collect($params)->except('_token');
        $slug = ($collection->get('return_date'));

        

        $merge = $collection->merge(compact('slug'));

        // set parent attribute default value if not set
        $params['parent'] = $params['parent'] ?? 0;

        // If parent category is not set on update
        // just make current category as root
        // else we need to find the parent
        // and associate it as child
        if ( (int)$params['parent'] == 0) {
            $ReturnProduct->save();
        } else {
            $parent = $this->findReturnProductById($params['id']);
            $ReturnProduct->parent()->associate($parent);
        }

        $ReturnProduct->update($merge->all());
        
        return $ReturnProduct;
    }

    /**
     * Delete a category
     *
     * @return bool
     * @throws \Exception
     */
    public function deleteReturnProduct() : bool
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