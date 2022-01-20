<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Requestss;
use App\Inventory\ProductStockTransfers\Requests\CreateStockTransferRequest;
use App\Inventory\ProductStockTransfers\StockTransfer;
use App\Inventory\ProductStockTransfers\Repositories\StockTransferRepository;
use App\Inventory\ProductStockTransfers\Repositories\Interfaces\StockTransferRepositoryInterface;

use App\Inventory\Products\Product;
use App\Inventory\ProductStocks\ProductStock;

class StockTransferController extends Controller
{
     /******************************/
  private $stocktransferRepo;
  /******************************/

 public function __construct(StockTransferRepositoryInterface $stocktransferRepository)
  {
    $this->stocktransferRepo = $stocktransferRepository;
  }
public function index()
 {  	
 	
 $list = $this->stocktransferRepo->listStockTransfers('created_at');
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
      $productstocks=ProductStock::get();

        return view('ProductStockTransfer.create', [
            'stocktransfers' => $this->stocktransferRepo->listStockTransfers('sender_house', 'asc'),'products'=>$products,'productstocks'=>$productstocks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createStockTransferRequest $request)
    {
       /*$categories = new Category();
       $categories->name = $request->name;
       $categories->save();*/
//dd($request->all());

       $this->stocktransferRepo->createStockTransfer($request->except('_token', '_method'));
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
      $productstocks=ProductStock::get();

        return view('ProductStockTransfer.edit', [
            'stocktransfers' => $this->stocktransferRepo->listStockTransfers('sender_house', 'asc', $id),
            'stocktransfer' => $this->stocktransferRepo->findStockTransferById($id),'products'=>$products,'productstocks'=>$productstocks
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCategoryRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(UpdateStockTransferRequest $request, $id)
    {
       // @dd($request->all());
        $stocktransfer = $this->stocktransferRepo->findStockTransferById($id);

        $update = new StockTransferRepository($stocktransfer);
        $update->updateStockTransfer($request->except('_token', '_method'));

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
        $stocktransfer = $this->stocktransferRepo->findStockTransferById($id);
       // $category->products()->sync([]);
        $stocktransfer->delete();

       // request()->session()->flash('message', 'Delete successful');
       // return redirect()->route('admin.categories.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
}
