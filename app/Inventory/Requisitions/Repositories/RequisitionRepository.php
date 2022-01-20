<?php

namespace App\Inventory\Requisitions\Repositories;

//use App\Inventory\Tools;
use Jsdecena\Baserepo\BaseRepository;
use App\Inventory\Requisitions\Requisition;
use App\Inventory\Requisitions\Exceptions\RequisitionInvalidArgumentException;
use App\Inventory\Requisitions\Exceptions\RequisitionCreateErrorException;
use App\Inventory\Requisitions\Exceptions\RequisitionNotFoundException;
// use App\Inventory\Categories\Exceptions\CategoryUpdateErrorException;
use App\Inventory\Requisitions\Repositories\Interfaces\RequisitionRepositoryInterface;
// use App\Inventory\Products\Product;
// use App\Inventory\Products\Transformations\ProductTransformable;
// use App\Inventory\Tools\UploadableTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;

class RequisitionRepository extends BaseRepository implements RequisitionRepositoryInterface
{

    /**
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(Requisition $requisition)
    {
        parent::__construct($requisition);
        $this->model = $requisition;
    }

    /**
     * List all the categories
     *
     * @param string $order
     * @param string $sort
     * @param array $except
     * @return \Illuminate\Support\Collection
     */
    public function listRequisitions(string $order = 'id', $except = []) : Collection
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


    public function rootRequisitions(string $order = 'id', $except = []) : Collection
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
    public function createRequisition(array $params) : Requisition
    {
        try {

            $collection = collect($params);
            if (isset($params['uuid'])) {
                $slug =($params['uuid']);
            }

           

            $merge = $collection->merge(compact('slug'));
            
            $customer = new Requisition($merge->all());

            /*if (isset($params['parent'])) {
                $parent = $this->findCategoryById($params['parent']);
                $category->parent()->associate($parent);
            }*/

            $customer->save();
            return $customer;
        } catch (QueryException $e) {
            throw new RequisitionInvalidArgumentException($e->getMessage());
        }
    }

   

    /**
     * @param int $id
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function findRequisitionById(int $id) : Requisition
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new RequisitionNotFoundException($e->getMessage());
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
    public function updateRequisition(array $params) : Requisition
    {  
        $category = $this->findRequisitionById($this->model->id);
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
            $parent = $this->findRequisitionById($params['id']);
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
    public function deleteRequisition() : bool
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
