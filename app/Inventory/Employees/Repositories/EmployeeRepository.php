<?php

namespace App\Inventory\Employees\Repositories;

use Jsdecena\Baserepo\BaseRepository;
use App\Inventory\Employees\Employee;
// use App\Inventory\Categories\Exceptions\CategoryInvalidArgumentException;
// use App\Inventory\Categories\Exceptions\CategoryNotFoundException;
use App\Inventory\Employees\Repositories\Interfaces\EmployeeRepositoryInterface;
// use App\Inventory\Products\Product;
// use App\Inventory\Products\Transformations\ProductTransformable;
// use App\Inventory\Tools\UploadableTrait;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use App\Inventory\Tools\UploadableTrait;

class EmployeeRepository extends BaseRepository implements EmployeeRepositoryInterface
{
     use UploadableTrait;

    /**
     * CategoryRepository constructor.
     * @param Category $category
     */
    public function __construct(Employee $employee)
    {
        parent::__construct($employee);
        $this->model = $employee;
    }

    /**
     * List all the categories
     *
     * @param string $order
     * @param string $sort
     * @param array $except
     * @return \Illuminate\Support\Collection
     */
    public function listEmployees(string $order = 'id', $except = []) : Collection
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
    public function rootEmployees(string $order = 'id', $except = []) : Collection
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
    public function createEmployee(array $params) : Employee
    {
        try {

            $collection = collect($params);
            if (isset($params['name'])) {
                $slug = ($params['name']);
            }
            if (isset($params['image']) && ($params['image'] instanceof UploadedFile)) {
                $cover = $this->uploadOne($params['image'], 'employees');

                $image=$params['image']->getClientOriginalName();
            }

            $merge = $collection->merge(compact('slug','cover', 'image'));

            $employee = new Employee($merge->all());

            $employee->save();
            return $employee;
        
        } catch (QueryException $e) {
            throw new CategoryInvalidArgumentException($e->getMessage());
        }
    }

   

    /**
     * @param int $id
     * @return Category
     * @throws CategoryNotFoundException
     */
    public function findEmployeeById(int $id) : Employee
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
    public function updateEmployee(array $params) : Employee
    {  
        $Employee = $this->findEmployeeById($this->model->id);
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
            $Employee->save();
        } else {
            $parent = $this->findEmployeeById($params['id']);
            $Employee->parent()->associate($parent);
        }

        $Employee->update($merge->all());
        
        return $Employee;
    }

    /**
     * Delete a category
     *
     * @return bool
     * @throws \Exception
     */
    public function deleteEmployee() : bool
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