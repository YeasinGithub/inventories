<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Requestss;
use App\Inventory\OrderPickings\Requests\CreateOrderPickingRequest;
use App\Inventory\OrderPickings\OrderPicking;
use App\Inventory\OrderPickings\Repositories\OrderPickingRepository;
use App\Inventory\OrderPickings\Repositories\Interfaces\OrderPickingRepositoryInterface;

use App\Inventory\Orders\Order;
use App\Inventory\Warehouses\Warehouse;
use App\Inventory\Employees\Employee;

class OrderPickingController extends Controller
{
    /******************************/
  private $orderpickingRepo;
  /******************************/

 public function __construct(OrderPickingRepositoryInterface $orderpickingRepository)
  {
    $this->orderpickingRepo = $orderpickingRepository;
  }
public function index()
 {  	
 	
 $list = $this->orderpickingRepo->listOrderPickings('created_at');
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

    	$orders=Order::get();
    	$warehouses=Warehouse::get();
    	$employees=Employee::get();
        return view('OrderPicking.create', [
            'orderpickings' => $this->orderpickingRepo->listOrderPickings('order_id', 'asc'),'orders'=>$orders,'warehouses'=>$warehouses,'employees'=>$employees
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createOrderPickingRequest $request)
    {
       /*$categories = new Category();
       $categories->name = $request->name;
       $categories->save();*/
//dd($request->all());

       $this->orderpickingRepo->createOrderPicking($request->except('_token', '_method'));
    }
/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $orders=Order::get();
      $warehouses=Warehouse::get();
      $employees=Employee::get();

        return view('OrderPicking.edit', [
            'orderpickings' => $this->orderpickingRepo->listOrderPickings('order_id', 'asc', $id),
            'orderpicking' => $this->orderpickingRepo->findOrderPickingById($id),'orders'=>$orders,'warehouses'=>$warehouses,'employees'=>$employees
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCategoryRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(UpdateOrderPickingRequest $request, $id)
    {
       // @dd($request->all());
        $orderpicking = $this->orderpickingRepo->findOrderPickingById($id);

        $update = new OrderPickingRepository($orderpicking);
        $update->updateOrderPicking($request->except('_token', '_method'));

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
        $orderpicking = $this->orderpickingRepo->findOrderPickingById($id);
       // $category->products()->sync([]);
        $orderpicking->delete();

       // request()->session()->flash('message', 'Delete successful');
       // return redirect()->route('admin.categories.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
}
