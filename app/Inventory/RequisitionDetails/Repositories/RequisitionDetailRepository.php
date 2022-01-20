<?php

namespace App\Inventory\RequisitionDetails\Repositories;

//use App\Inventory\Tools;
use Jsdecena\Baserepo\BaseRepository;
use App\Inventory\RequisitionDetails\RequisitionDetail;
use App\Inventory\RequisitionDetails\Exceptions\RequisitionDetailInvalidArgumentException;
use App\Inventory\RequisitionDetails\Exceptions\RequisitionDetailCreateErrorException;
use App\Inventory\RequisitionDetails\Exceptions\RequisitionDetailNotFoundException;
// use App\Inventory\Categories\Exceptions\CategoryUpdateErrorException;
use App\Inventory\RequisitionDetails\Repositories\Interfaces\RequisitionDetailRepositoryInterface;
// use App\Inventory\Products\Product;
// use App\Inventory\Products\Transformations\ProductTransformable;
// use App\Inventory\Tools\UploadableTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Collection;

class RequisitionDetailRepository extends BaseRepository implements RequisitionDetailRepositoryInterface
{

    /**
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(RequisitionDetail $requisitiondetail)
    {
        parent::__construct($requisitiondetail);
        $this->model = $requisitiondetail;
    }

    /**
     * List all the categories
     *
     * @param string $order
     * @param string $sort
     * @param array $except
     * @return \Illuminate\Support\Collection
     */
    public function listRequisitionDetails(string $order = 'id', $except = []) : Collection
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


    public function rootRequisitionDetails(string $order = 'id', $except = []) : Collection
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
    public function createRequisitionDetail(array $params) : RequisitionDetail
    {
        try {

            $collection = collect($params);
            if (isset($params['requisition_id'])) {
                $slug =($params['requisition_id']);
            }

           

            $merge = $collection->merge(compact('slug'));
            
            $customer = new RequisitionDetail($merge->all());

            /*if (isset($params['parent'])) {
                $parent = $this->findCategoryById($params['parent']);
                $category->parent()->associate($parent);
            }*/

            $customer->save();
            return $customer;
        } catch (QueryException $e) {
            throw new RequisitionDetailInvalidArgumentException($e->getMessage());
        }
    }

   

    /**
     * @param int $id
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function findRequisitionDetailById(int $id) : RequisitionDetail
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new RequisitionDetailNotFoundException($e->getMessage());
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
    public function updateRequisitionDetail(array $params) : RequisitionDetail
    {  
        $category = $this->findRequisitionDetailById($this->model->id);
        $collection = collect($params)->except('_token');
        $slug = ($collection->get('requisition_id'));

        

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
            $parent = $this->findRequisitionDetailById($params['id']);
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
    public function deleteRequisitionDetail() : bool
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
