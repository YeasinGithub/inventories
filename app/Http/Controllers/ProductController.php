<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Requestss;
use App\Inventory\Products\Requests\CreateProductRequest;
use App\Inventory\Products\Repositories\ProductRepository;
use App\Inventory\Products\Repositories\Interfaces\ProductRepositoryInterface;
use App\Inventory\Products\Product;

use App\Inventory\Categories\Category;
use App\Inventory\SubCategories\SubCategory;
use App\Inventory\SubSubCategories\SubSubCategory;
use App\Inventory\UnitMeasures\UnitMeasure;

class ProductController extends Controller
{
    /******************************/
  private $productRepo;
  /******************************/

 public function __construct(ProductRepositoryInterface $productRepository)
  {
    $this->productRepo = $productRepository;
  }
public function index()
 {  	
 	
 $list = $this->productRepo->listProducts('created_at');
   return view('Product.productShow', [
           'products' => $this->productRepo->paginateArrayResults($list->all())
   ]);
	 // return $list;
  }
  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
    {

      $categories=Category::get();
      $Subcategories=SubCategory::get();
      $SubSubcategories=SubSubCategory::get();
      $UnitMeasures=UnitMeasure::get();

        return view('Product.create', [
            'products' => $this->productRepo->listProducts('name', 'asc'),'categories'=>$categories,'Subcategories'=>$Subcategories,'SubSubcategories'=>$SubSubcategories,'UnitMeasures'=>$UnitMeasures
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createProductRequest $request)
    {
       /*$categories = new Category();
       $categories->name = $request->name;
       $categories->save();*/
//dd($request->all());


       $this->productRepo->createProduct($request->except('_token', '_method'));
    }
/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    
       $categories=Category::get();
      $Subcategories=SubCategory::get();
      $SubSubcategories=SubSubCategory::get();
      $UnitMeasures=UnitMeasure::get();
        return view('Product.edit', [
            'products' => $this->productRepo->listProducts('name', 'asc', $id),
            'product' => $this->productRepo->findProductById($id),
            'categories'=>$categories,'Subcategories'=>$Subcategories, 'SubSubcategories'=>$SubSubcategories,'UnitMeasures'=>$UnitMeasures
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCategoryRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(UpdateProductRequest $request, $id)
    {
       // @dd($request->all());
        $product = $this->productRepo->findProductById($id);

        $update = new ProductRepository($product);
        $update->updateProduct($request->except('_token', '_method'));

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
        $product = $this->productRepo->findProductById($id);
       // $category->products()->sync([]);
        $product->delete();

       // request()->session()->flash('message', 'Delete successful');
       // return redirect()->route('admin.categories.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
      public function search(Request $request)
    {

      $search = $request->search;

     $products = Product::orWhere('name', 'like','%'. $search.'%')
     ->orderBy('id', 'desc')->get();

     return view('Product.productShow',compact('search','products'));
    }

}
