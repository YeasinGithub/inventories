<?php

namespace App\Inventory\ProductStocks\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Inventory\ProductStocks\ProductStock;
// use App\Inventory\Categories\Exceptions\CategoryInvalidArgumentException;
// use App\Inventory\Categories\Exceptions\CategoryNotFoundException;
use App\Inventory\ProductStocks\Repositories\Interfaces\ProductStockRepositoryInterface;
// use App\Inventory\Products\Product;
// use App\Inventory\Products\Transformations\ProductTransformable;
// use App\Inventory\Tools\UploadableTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use App\Inventory\Tools\UploadableTrait;

class ProductStockRepository extends BaseRepository implements ProductStockRepositoryInterface
{
     use UploadableTrait;

    /**
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(ProductStock $productstock)
    {
        parent::__construct($productstock);
        $this->model = $productstock;
    }

    /**
     * List all the categories
     *
     * @param string $order
     * @param string $sort
     * @param array $except
     * @return \Illuminate\Support\Collection
     */
    public function listProductStocks(string $order = 'id', $except = []) : Collection
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
    public function rootProductStocks(string $order = 'id', $except = []) : Collection
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
    public function createProductStock(array $params) : ProductStock
    {
        try {

            $collection = collect($params);
            if (isset($params['product_id'])) {
                $slug = ($params['product_id']);
            }
            /*if (isset($params['image']) && ($params['image'] instanceof UploadedFile)) {
                $cover = $this->uploadOne($params['image'], 'productstocks');
            }*/

            $merge = $collection->merge(compact('slug'));

            $productstock = new ProductStock($merge->all());

            $productstock->save();
            return $productstock;
        
        } catch (QueryException $e) {
            throw new ProductStockInvalidArgumentException($e->getMessage());
        }
    }

   

    /**
     * @param int $id
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function findProductStockById(int $id) : ProductStock
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new ProductStockNotFoundException($e->getMessage());
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
    public function updateProductStock(array $params) : ProductStock
    {  
        $ProductStock = $this->findProductStockById($this->model->id);
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
            $ProductStock->save();
        } else {
            $parent = $this->findProductStockById($params['id']);
            $Employee->parent()->associate($parent);
        }

        $ProductStock->update($merge->all());
        
        return $ProductStock;
    }

    /**
     * Delete a category
     *
     * @return bool
     * @throws \Exception
     */
    public function deleteProductStock() : bool
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