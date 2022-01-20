<?php

namespace App\Inventory\ProductStockTransfers\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Inventory\ProductStockTransfers\StockTransfer;
// use App\Inventory\Categories\Exceptions\CategoryInvalidArgumentException;
// use App\Inventory\Categories\Exceptions\CategoryNotFoundException;
use App\Inventory\ProductStockTransfers\Repositories\Interfaces\StockTransferRepositoryInterface;
// use App\Inventory\Products\Product;
// use App\Inventory\Products\Transformations\ProductTransformable;
// use App\Inventory\Tools\UploadableTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use App\Inventory\Tools\UploadableTrait;

class StockTransferRepository extends BaseRepository implements StockTransferRepositoryInterface
{
     use UploadableTrait;

    /**
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(StockTransfer $stocktransfer)
    {
        parent::__construct($stocktransfer);
        $this->model = $stocktransfer;
    }

    /**
     * List all the categories
     *
     * @param string $order
     * @param string $sort
     * @param array $except
     * @return \Illuminate\Support\Collection
     */
    public function listStockTransfers(string $order = 'id', $except = []) : Collection
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
    public function rootStockTransfers(string $order = 'id', $except = []) : Collection
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
    public function createStockTransfer(array $params) : StockTransfer
    {
        try {

            $collection = collect($params);
            if (isset($params['sender_house'])) {
                $slug = ($params['sender_house']);
            }

            $merge = $collection->merge(compact('slug'));

            $stocktransfer = new StockTransfer($merge->all());

            $stocktransfer->save();
            return $stocktransfer;
        
        } catch (QueryException $e) {
            throw new CategoryInvalidArgumentException($e->getMessage());
        }
    }

   

    /**
     * @param int $id
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function findStockTransferById(int $id) : StockTransfer
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new StockTransferNotFoundException($e->getMessage());
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
    public function updateStockTransfer(array $params) : StockTransfer
    {  
        $StockTransfer = $this->findStockTransferById($this->model->id);
        $collection = collect($params)->except('_token');
        $slug = ($collection->get('sender_house'));

        

        $merge = $collection->merge(compact('slug'));

        // set parent attribute default value if not set
        $params['parent'] = $params['parent'] ?? 0;

        // If parent category is not set on update
        // just make current category as root
        // else we need to find the parent
        // and associate it as child
        if ( (int)$params['parent'] == 0) {
            $StockTransfer->save();
        } else {
            $parent = $this->findStockTransferById($params['id']);
            $StockTransfer->parent()->associate($parent);
        }

        $StockTransfer->update($merge->all());
        
        return $StockTransfer;
    }

    /**
     * Delete a category
     *
     * @return bool
     * @throws \Exception
     */
    public function deleteStockTransfer() : bool
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