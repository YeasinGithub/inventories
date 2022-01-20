<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Requestss;
use App\Inventory\Categories\Requests\CreateCategoryRequest;
use Illuminate\Http\Request;
use App\Inventory\Categories\Repositories\CategoryRepository;
use App\Inventory\Categories\Repositories\Interfaces\CategoryRepositoryInterface;
use App\Inventory\Categories\Category;



class CategoryController extends Controller
{
  /******************************/
  private $categoryRepo;
  /******************************/

 public function __construct(CategoryRepositoryInterface $categoryRepository)
  {
    $this->categoryRepo = $categoryRepository;
  }
public function index()
 {  	
 	
 $list = $this->categoryRepo->listCategories('created_at', 'desc');
  /*return view('Category.CategoryShow', [
           'categories' => $this->categoryRepo->paginateArrayResults($list->all())
           ]);*/
	  //return $list;
           return response()->json([
      'success' => true,
      'message' => 'Category List',
      'data'    => $list
  ]);
  }
  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
    {
        return view('Category.categoryAdd', [
            'categories' => $this->categoryRepo->listCategories('name', 'asc')
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
//dd($request->all());

       $this->categoryRepo->createCategory($request->except('_token', '_method'));
    }
/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Category.categoryEdit', [
            'categories' => $this->categoryRepo->listCategories('name', 'asc', $id),
            'category' => $this->categoryRepo->findCategoryById($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCategoryRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(UpdateCategoryRequest $request, $id)
    {
       // @dd($request->all());
        $category = $this->categoryRepo->findCategoryById($id);

        $update = new CategoryRepository($category);
        $update->updateCategory($request->except('_token', '_method'));

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
        $category = $this->categoryRepo->findCategoryById($id);
       // $category->products()->sync([]);
        $category->delete();


       // request()->session()->flash('message', 'Delete successful');
       // return redirect()->route('admin.categories.index');
    }

  }

<<<<<<< HEAD
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function search(Request $request)
    {

      $search = $request->search;

     $categories = Category::orWhere('name', 'like','%'. $search.'%')
      ->orWhere('status', 'like','%'. $search.'%')
      ->orWhere('discount', 'like','%'. $search.'%')
     ->orderBy('id', 'desc')->get();

     return view('Category.categoryShow',compact('search','categories'));
    }
=======
   
>>>>>>> 857d0133688f07eb8557b1385b24f687043c0883


}
