<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Requestss;
//use App\Inventory\ProductStocks\Requests\CreateProductStockRequest;
use App\Inventory\ProductStocks\ProductStock;
use App\Inventory\ProductStocks\Repositories\ProductStockRepository;
use App\Inventory\ProductStocks\Repositories\Interfaces\ProductStockRepositoryInterface;
use App\Inventory\Products\Product;
use App\Inventory\Warehouses\Warehouse;

class ProductStockController extends Controller
{
    /******************************/
  private $productstockRepo;
  /******************************/

 public function __construct(ProductStockRepositoryInterface $productstockRepository)
  {
    $this->productstockRepo = $productstockRepository;
  }
public function index()
 {  	
 	
 $list = $this->productstockRepo->listProductStocks('created_at');
   //return view('test', compact($list, 'list'));
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
      $warehouses=Warehouse::get();
        return view('ProductStock.create', [
            'productstocks' => $this->productstockRepo->listProductStocks('product_id', 'asc'),'products'=>$products,'warehouses'=>$warehouses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /*$categories = new Category();
       $categories->name = $request->name;
       $categories->save();*/
//@dd($request->all());

       $this->productstockRepo->createProductStock($request->except('_token', '_method'));
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
      $warehouses=Warehouse::get();
        return view('ProductStock.edit', [
            'productstocks' => $this->productstockRepo->listProductStocks('product_id', 'asc', $id),
            'productstock' => $this->productstockRepo->findProductStockById($id),'products'=>$products,'warehouses'=>$warehouses
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCategoryRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(UpdateProductStockRequest $request, $id)
    {
       // @dd($request->all());
        $productstock = $this->productstockRepo->findProductStockById($id);

        $update = new ProductStockRepository($productstock);
        $update->updateProductStock($request->except('_token', '_method'));

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
        $employee = $this->productstockRepo->findProductStockById($id);
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
