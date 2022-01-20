<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Requestss;
use App\Inventory\OrderTrackings\Requests\CreateOrderTrackingRequest;
use App\Inventory\OrderTrackings\OrderTracking;
use App\Inventory\OrderTrackings\Repositories\OrderTrackingRepository;
use App\Inventory\OrderTrackings\Repositories\Interfaces\OrderTrackingRepositoryInterface;

use App\Inventory\Orders\Order;

class OrderTrackingController extends Controller
{
    /******************************/
  private $ordertrackingRepo;
  /******************************/

 public function __construct(OrderTrackingRepositoryInterface $ordertrackingRepository)
  {
    $this->ordertrackingRepo = $ordertrackingRepository;
  }
public function index()
 {  	
 	
 $list = $this->ordertrackingRepo->listOrderTrackings('created_at');
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
    	$orders = Order::get();
        return view('OrderTracking.create', [
            'ordertrackings' => $this->ordertrackingRepo->listOrderTrackings('order_accept', 'asc'),'orders'=>$orders
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createOrderTrackingRequest $request)
    {
       /*$categories = new Category();
       $categories->name = $request->name;
       $categories->save();*/
//dd($request->all());

       $this->ordertrackingRepo->createOrderTracking($request->except('_token', '_method'));
    }
/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$orders = Order::get();
        return view('OrderTracking.edit', [
            'ordertrackings' => $this->ordertrackingRepo->listOrderTrackings('order_id', 'asc', $id),
            'ordertracking' => $this->ordertrackingRepo->findOrderTrackingById($id),'orders'=>$orders
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCategoryRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
    {
       // @dd($request->all());
        $ordertracking = $this->ordertrackingRepo->findOrderTrackingById($id);

        $update = new OrderTrackingRepository($ordertracking);
        $update->updateOrderTracking($request->except('_token', '_method'));

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
        $ordertracking = $this->ordertrackingRepo->findOrderTrackingById($id);
       // $category->products()->sync([]);
        $ordertracking->delete();

       // request()->session()->flash('message', 'Delete successful');
       // return redirect()->route('admin.categories.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
}
