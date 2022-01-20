<?php

namespace App\Inventory\OrderPickings\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Inventory\OrderPickings\OrderPicking;
// use App\Inventory\Categories\Exceptions\CategoryInvalidArgumentException;
// use App\Inventory\Categories\Exceptions\CategoryNotFoundException;
use App\Inventory\OrderPickings\Repositories\Interfaces\OrderPickingRepositoryInterface;
// use App\Inventory\Products\Product;
// use App\Inventory\Products\Transformations\ProductTransformable;
// use App\Inventory\Tools\UploadableTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use App\Inventory\Tools\UploadableTrait;

class OrderPickingRepository extends BaseRepository implements OrderPickingRepositoryInterface
{
     use UploadableTrait;

    /**
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(OrderPicking $orderpicking)
    {
        parent::__construct($orderpicking);
        $this->model = $orderpicking;
    }

    /**
     * List all the categories
     *
     * @param string $order
     * @param string $sort
     * @param array $except
     * @return \Illuminate\Support\Collection
     */
    public function listOrderPickings(string $order = 'id', $except = []) : Collection
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
    public function rootOrderPickings(string $order = 'id', $except = []) : Collection
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
    public function createOrderPicking(array $params) : OrderPicking
    {
        try {

            $collection = collect($params);
            if (isset($params['order_id'])) {
                $slug = ($params['order_id']);
            }

            $merge = $collection->merge(compact('slug'));

            $orderpicking = new OrderPicking($merge->all());

            $orderpicking->save();
            return $orderpicking;
        
        } catch (QueryException $e) {
            throw new CategoryInvalidArgumentException($e->getMessage());
        }
    }

   

    /**
     * @param int $id
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function findOrderPickingById(int $id) : OrderPicking
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
    public function updateOrderPicking(array $params) : OrderPicking
    {  
        $OrderPicking = $this->findOrderPickingById($this->model->id);
        $collection = collect($params)->except('_token');
        $slug = ($collection->get('order_id'));

        

        $merge = $collection->merge(compact('slug'));

        // set parent attribute default value if not set
        $params['parent'] = $params['parent'] ?? 0;

        // If parent category is not set on update
        // just make current category as root
        // else we need to find the parent
        // and associate it as child
        if ( (int)$params['parent'] == 0) {
            $OrderPicking->save();
        } else {
            $parent = $this->findOrderPickingById($params['id']);
            $OrderPicking->parent()->associate($parent);
        }

        $OrderPicking->update($merge->all());
        
        return $OrderPicking;
    }

    /**
     * Delete a category
     *
     * @return bool
     * @throws \Exception
     */
    public function deleteOrderPicking() : bool
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