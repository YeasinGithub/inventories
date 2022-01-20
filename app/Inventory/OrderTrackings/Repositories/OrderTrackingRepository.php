<?php

namespace App\Inventory\OrderTrackings\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Inventory\OrderTrackings\OrderTracking;
 use App\Inventory\OrderTrackings\Exceptions\OrderTrackingInvalidArgumentException;
// use App\Inventory\Categories\Exceptions\CategoryNotFoundException;
use App\Inventory\OrderTrackings\Repositories\Interfaces\OrderTrackingRepositoryInterface;
// use App\Inventory\Products\Product;
// use App\Inventory\Products\Transformations\ProductTransformable;
// use App\Inventory\Tools\UploadableTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use App\Inventory\Tools\UploadableTrait;

class OrderTrackingRepository extends BaseRepository implements OrderTrackingRepositoryInterface
{
     use UploadableTrait;

    /**
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(OrderTracking $ordertracking)
    {
        parent::__construct($ordertracking);
        $this->model = $ordertracking;
    }

    /**
     * List all the categories
     *
     * @param string $order
     * @param string $sort
     * @param array $except
     * @return \Illuminate\Support\Collection
     */
    public function listOrderTrackings(string $order = 'id', $except = []) : Collection
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
    public function rootOrderTrackings(string $order = 'id', $except = []) : Collection
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
    public function createOrderTracking(array $params) : OrderTracking
    {
        try {

            $collection = collect($params);
            if (isset($params['order_accept'])) {
                $slug = ($params['order_accept']);
            }
            
            $merge = $collection->merge(compact('slug'));

            $ordertracking = new OrderTracking($merge->all());

            $ordertracking->save();
            return $ordertracking;
        
        } catch (QueryException $e) {
            throw new OrderTrackingInvalidArgumentException($e->getMessage());
        }
    }

   

    /**
     * @param int $id
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function findOrderTrackingById(int $id) : OrderTracking
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new OrderTrackingNotFoundException($e->getMessage());
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
    public function updateOrderTracking(array $params) : OrderTracking
    {  
        $OrderTracking = $this->findOrderTrackingById($this->model->id);
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
            $OrderTracking->save();
        } else {
            $parent = $this->findOrderTrackingById($params['id']);
            $OrderTracking->parent()->associate($parent);
        }

        $OrderTracking->update($merge->all());
        
        return $OrderTracking;
    }

    /**
     * Delete a category
     *
     * @return bool
     * @throws \Exception
     */
    public function deleteOrderTracking() : bool
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