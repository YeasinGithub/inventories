<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Requestss;
use App\Inventory\ReturnProducts\Requests\CreateReturnProductRequest;
use App\Inventory\ReturnProducts\ReturnProduct;
use App\Inventory\ReturnProducts\Repositories\ReturnProductRepository;
use App\Inventory\ReturnProducts\Repositories\Interfaces\ReturnProductRepositoryInterface;

use App\Inventory\Orders\Order;

class ReturnProductController extends Controller
{
    /******************************/
  private $returnproductRepo;
  /******************************/

 public function __construct(ReturnProductRepositoryInterface $returnproductRepository)
  {
    $this->returnproductRepo = $returnproductRepository;
  }
public function index()
 {  	
 	
 $list = $this->returnproductRepo->listReturnProducts('created_at');
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
        return view('ReturnProduct.create', [
            'returnproducts' => $this->returnproductRepo->listReturnProducts('return_date', 'asc'),'orders'=>$orders
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createReturnProductRequest $request)
    {
       /*$categories = new Category();
       $categories->name = $request->name;
       $categories->save();*/
//dd($request->all());

       $this->returnproductRepo->createReturnProduct($request->except('_token', '_method'));
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
        return view('ReturnProduct.edit', [
            'returnproducts' => $this->returnproductRepo->listReturnProducts('return_date', 'asc', $id),
            'returnproduct' => $this->returnproductRepo->findReturnProductById($id),'orders'=>$orders
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
        $returnproduct = $this->returnproductRepo->findReturnProductById($id);

        $update = new ReturnProductRepository($returnproduct);
        $update->updateReturnProduct($request->except('_token', '_method'));

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
        $returnproduct = $this->returnproductRepo->findReturnProductById($id);
       // $category->products()->sync([]);
        $returnproduct->delete();

       // request()->session()->flash('message', 'Delete successful');
       // return redirect()->route('admin.categories.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
}
