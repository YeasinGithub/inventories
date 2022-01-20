<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Requestss;
use App\Inventory\OrderDetails\Requests\CreateOrderDetailRequest;
use App\Inventory\OrderDetails\OrderDetail;
use App\Inventory\OrderDetails\Repositories\OrderDetailRepository;
use App\Inventory\OrderDetails\Repositories\Interfaces\OrderDetailRepositoryInterface;

use App\Inventory\Products\Product;
use App\Inventory\Orders\Order;

class OrderDetailController extends Controller
{
    /******************************/
  private $orderdetailRepo;
  /******************************/

 public function __construct(OrderDetailRepositoryInterface $orderdetailRepository)
  {
    $this->orderdetailRepo = $orderdetailRepository;
  }
public function index()
 {  	
 	
 $list = $this->orderdetailRepo->listOrderDetails('created_at');
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
    	$products=Product::get();
    	$orders=Order::get();
        return view('OrderDetail.create', [
            'orderdetails' => $this->orderdetailRepo->listOrderDetails('unitcost', 'asc'),'products'=>$products,'orders'=>$orders
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createOrderDetailRequest $request)
    {
       /*$categories = new Category();
       $categories->name = $request->name;
       $categories->save();*/
//dd($request->all());

       $this->orderdetailRepo->createOrderDetail($request->except('_token', '_method'));
    }
/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $products=Product::get();
      $orders=Order::get();
        return view('OrderDetail.edit', [
            'orderdetails' => $this->orderdetailRepo->listOrderDetails('unitcost', 'asc', $id),
            'orderdetail' => $this->orderdetailRepo->findOrderDetailById($id),'products'=>$products,'orders'=>$orders
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
        $orderdetail = $this->orderdetailRepo->findOrderDetailById($id);

        $update = new OrderDetailRepository($orderdetail);
        $update->updateOrderDetail($request->except('_token', '_method'));

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
        $orderdetail = $this->orderdetailRepo->findOrderDetailById($id);
       // $category->products()->sync([]);
        $orderdetail->delete();

       // request()->session()->flash('message', 'Delete successful');
       // return redirect()->route('admin.categories.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
}
