<?php

namespace App\Inventory\Warehouses\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Inventory\Warehouses\Warehouse;
// use App\Inventory\Categories\Exceptions\CategoryInvalidArgumentException;
// use App\Inventory\Categories\Exceptions\CategoryNotFoundException;
use App\Inventory\Warehouses\Repositories\Interfaces\WarehouseRepositoryInterface;
// use App\Inventory\Products\Product;
// use App\Inventory\Products\Transformations\ProductTransformable;
// use App\Inventory\Tools\UploadableTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use App\Inventory\Tools\UploadableTrait;

class WarehouseRepository extends BaseRepository implements WarehouseRepositoryInterface
{
     use UploadableTrait;

    /**
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(Warehouse $warehouse)
    {
        parent::__construct($warehouse);
        $this->model = $warehouse;
    }

    /**
     * List all the categories
     *
     * @param string $order
     * @param string $sort
     * @param array $except
     * @return \Illuminate\Support\Collection
     */
    public function listWarehouses(string $order = 'id', $except = []) : Collection
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
    public function rootWarehouses(string $order = 'id', $except = []) : Collection
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
    public function createWarehouse(array $params) : Warehouse
    {
        try {

            $collection = collect($params);
            if (isset($params['name'])) {
                $slug = ($params['name']);
            }
            

            $merge = $collection->merge(compact('slug'));

            $warehouse = new Warehouse($merge->all());

            $warehouse->save();
            return $warehouse;
        
        } catch (QueryException $e) {
            throw new WarehouseInvalidArgumentException($e->getMessage());
        }
    }

   

    /**
     * @param int $id
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function findWarehouseById(int $id) : Warehouse
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new WarehouseNotFoundException($e->getMessage());
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
    public function updateWarehouse(array $params) : Warehouse
    {  
        $warehouse = $this->findWarehouseById($this->model->id);
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
            $warehouse->save();
        } else {
            $parent = $this->findWarehouseById($params['id']);
            $warehouse->parent()->associate($parent);
        }

        $warehouse->update($merge->all());
        
        return $warehouse;
    }

    /**
     * Delete a category
     *
     * @return bool
     * @throws \Exception
     */
    public function deleteWareHouse() : bool
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