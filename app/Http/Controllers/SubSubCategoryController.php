<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;

use Illuminate\Support\Facades\Requestss;
//use App\Inventory\SubSubCategories\Requests\CreateSubSubCategoryRequest;
use App\Inventory\SubSubCategories\SubSubCategory;
use Illuminate\Http\Request;
use App\Inventory\SubSubCategories\Repositories\SubSubCategoryRepository;
use App\Inventory\SubSubCategories\Repositories\Interfaces\SubSubCategoryRepositoryInterface;
use App\Inventory\SubCategories\SubCategory;

class SubSubCategoryController extends Controller
{
    /******************************/
  private $SubSubcategoryRepo;
  /******************************/

 public function __construct(SubSubCategoryRepositoryInterface $SubSubcategoryRepository)
  {
    $this->SubSubcategoryRepo = $SubSubcategoryRepository;
  }
public function index()
 {    
  
 $list = $this->SubSubcategoryRepo->listSubSubCategories('created_at','desc');
   return view('SubSubCategory.SubSubCategoryShow', [
           'SubSubCategories' => $this->SubSubcategoryRepo->paginateArrayResults($list->all())
   ]);
    //return $list;
  }
  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()

    {
      //$categories=Category::get();
      //$categories=Category::where('status', 1)->get();
      $sub_categories = SubCategory::get();
        return view('SubSubCategory.create', [
            'SubSubcategories' => $this->SubSubcategoryRepo->listSubSubCategories('name', 'asc'), 'sub_categories'=>$sub_categories
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

       $this->SubSubcategoryRepo->createSubSubCategory($request->except('_token', '_method'));
    }
/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('SubSubCategory.edit', [
            'SubSubcategories' => $this->SubSubcategoryRepo->listSubSubCategories('name', 'asc', $id),
            'SubSubcategory' => $this->SubSubcategoryRepo->findSubSubCategoryById($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCategoryRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(UpdateSubSubCategoryRequest $request, $id)
    {
       // @dd($request->all());
        $category = $this->SubSubcategoryRepo->findSubSubCategoryById($id);

        $update = new SubSubCategoryRepository($category);
        $update->updateSubSubCategory($request->except('_token', '_method'));

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
        $category = $this->SubSubcategoryRepo->findSubSubCategoryById($id);
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
