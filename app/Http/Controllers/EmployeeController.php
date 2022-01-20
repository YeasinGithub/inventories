<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Requestss;
use App\Inventory\Employees\Requests\CreateEmployeeRequest;
use App\Inventory\Employees\Employee;
use App\Inventory\Employees\Repositories\EmployeeRepository;
use App\Inventory\Employees\Repositories\Interfaces\EmployeeRepositoryInterface;

class EmployeeController extends Controller
{
    /******************************/
  private $employeeRepo;
  /******************************/

 public function __construct(EmployeeRepositoryInterface $employeeRepository)
  {
    $this->employeeRepo = $employeeRepository;
  }
public function index()
 {  	
 	
 $list = $this->employeeRepo->listEmployees('created_at');
   /*return view('Employee.categoryShow', [
           'categories' => $this->categoryRepo->paginateArrayResults($list->all())
   ]);*/
	  return $list;
  }
  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
    {
        return view('Employee.create', [
            'employees' => $this->employeeRepo->listEmployees('name', 'asc')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createEmployeeRequest $request)
    {
       /*$categories = new Category();
       $categories->name = $request->name;
       $categories->save();*/
//dd($request->all());

       $this->employeeRepo->createEmployee($request->except('_token', '_method'));
    }
/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Employee.edit', [
            'employees' => $this->employeeRepo->listEmployees('name', 'asc', $id),
            'employee' => $this->employeeRepo->findEmployeeById($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCategoryRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(UpdateEmployeeRequest $request, $id)
    {
       // @dd($request->all());
        $employee = $this->employeeRepo->findEmployeeById($id);

        $update = new EmployeeRepository($employee);
        $update->updateEmployee($request->except('_token', '_method'));

       //$request->session()->flash('message', 'Update successful');
        //return redirect()->route('admin.categories.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(int $id)
    {
        $employee = $this->employeeRepo->findEmployeeById($id);
       // $category->products()->sync([]);
        $employee->delete();

       // request()->session()->flash('message', 'Delete successful');
       // return redirect()->route('admin.categories.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
}
