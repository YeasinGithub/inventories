<?php

namespace App\Http\Controllers;
//use Illuminate\Http\Request;
/*copy*/
use Illuminate\Support\Facades\Requestss;
//use App\Inventory\SubCategories\Requests\CreateSubCategoryRequest;
use App\Inventory\SubCategories\SubCategory;
use Illuminate\Http\Request;
use App\Inventory\SubCategories\Repositories\SubCategoryRepository;
use App\Inventory\SubCategories\Repositories\Interfaces\SubCategoryRepositoryInterface;

use App\Inventory\Categories\Category;


class SubCategoryController extends Controller
{
  /******************************/
  private $SubcategoryRepo;
  /******************************/

 public function __construct(SubCategoryRepositoryInterface $SubcategoryRepository)
  {
    $this->SubcategoryRepo = $SubcategoryRepository;
  }
public function index()
 {  	
 	
 $list = $this->SubcategoryRepo->listSubCategories('created_at', 'desc');
   return view('SubCategory.SubCategoryShow', [
           'SubCategories' => $this->SubcategoryRepo->paginateArrayResults($list->all())
   ]);
	  //return $list;
  }
  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create( )

    {


      //$categories=Category::get();
      $categories=Category::where('status', 1)->get();
      
        return view('SubCategory.create', [
            'Subcategories' => $this->SubcategoryRepo->listSubCategories('name', 'asc'), 'categories'=>$categories
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




        
           //echo ($request->all());

       /*$categories = new Category();
       $categories->name = $request->name;
       $categories->save();*/
  //dd($request->all());

       $this->SubcategoryRepo->createSubCategory($request->except('_token', '_method'));
    }
/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('SubCategory.edit', [
            'Subcategories' => $this->SubcategoryRepo->listSubCategories('name', 'asc', $id),
            'Subcategory' => $this->SubcategoryRepo->findSubCategoryById($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCategoryRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(UpdateSubCategoryRequest $request, $id)
    {
       // @dd($request->all());
        $category = $this->SubcategoryRepo->findSubCategoryById($id);

        $update = new SubCategoryRepository($category);
        $update->updateSubCategory($request->except('_token', '_method'));

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
        $category = $this->SubcategoryRepo->findSubCategoryById($id);
       // $category->products()->sync([]);
        $category->delete();

       // request()->session()->flash('message', 'Delete successful');
       // return redirect()->route('admin.categories.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
}
