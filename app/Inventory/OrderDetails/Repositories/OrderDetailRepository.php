<?php

namespace App\Inventory\OrderDetails\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Inventory\OrderDetails\OrderDetail;
// use App\Inventory\Categories\Exceptions\CategoryInvalidArgumentException;
// use App\Inventory\Categories\Exceptions\CategoryNotFoundException;
use App\Inventory\OrderDetails\Repositories\Interfaces\OrderDetailRepositoryInterface;
// use App\Inventory\Products\Product;
// use App\Inventory\Products\Transformations\ProductTransformable;
// use App\Inventory\Tools\UploadableTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use App\Inventory\Tools\UploadableTrait;

class OrderDetailRepository extends BaseRepository implements OrderDetailRepositoryInterface
{
     use UploadableTrait;

    /**
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(OrderDetail $orderdetail)
    {
        parent::__construct($orderdetail);
        $this->model = $orderdetail;
    }

    /**
     * List all the categories
     *
     * @param string $order
     * @param string $sort
     * @param array $except
     * @return \Illuminate\Support\Collection
     */
    public function listOrderDetails(string $order = 'id', $except = []) : Collection
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
    public function rootOrderDetails(string $order = 'id', $except = []) : Collection
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
    public function createOrderDetail(array $params) : OrderDetail
    {
        try {

            $collection = collect($params);
            if (isset($params['unitcost'])) {
                $slug = ($params['unitcost']);
            }
            

            $merge = $collection->merge(compact('slug'));

            $orderdetail = new OrderDetail($merge->all());

            $orderdetail->save();
            return $orderdetail;
        
        } catch (QueryException $e) {
            throw new CategoryInvalidArgumentException($e->getMessage());
        }
    }

   

    /**
     * @param int $id
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function findOrderDetailById(int $id) : OrderDetail
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
    public function updateOrderDetail(array $params) : OrderDetail
    {  
        $OrderDetail = $this->findOrderDetailById($this->model->id);
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
            $OrderDetail->save();
        } else {
            $parent = $this->findOrderDetailById($params['id']);
            $OrderDetail->parent()->associate($parent);
        }

        $OrderDetail->update($merge->all());
        
        return $OrderDetail;
    }

    /**
     * Delete a category
     *
     * @return bool
     * @throws \Exception
     */
    public function deleteOrderDetail() : bool
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