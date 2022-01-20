<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Requestss;
use App\Inventory\Requisitions\Requests\CreateRequisitionRequest;
use App\Inventory\Requisitions\Repositories\RequisitionRepository;
use App\Inventory\Requisitions\Repositories\Interfaces\RequisitionRepositoryInterface;
use App\Inventory\Requisitions\Requisition;

class RequisitionController extends Controller
{
    private $requisitionRepo;
  /******************************/

 public function __construct(RequisitionRepositoryInterface $requisitionRepository)
  {
    $this->requisitionRepo = $requisitionRepository;
  }

 
public function index()
 {      
    
  $list = $this->requisitionRepo->listRequisitions('created_at', 'desc');
           return response()->json([
      'success' => true,
      'message' => 'Requisitions List',
      'data'    => $list
  ]);
     return $list;
      //return "helo";
  }
  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function create()
    {
        /*return view('Category.categoryAdd', [
            'categories' => $this->customerInfoRepo->listCustomerInfos('name', 'asc')
        ]);*/
    }
public function show($id)
    {
        $CustomerInfo = $this->requisitionRepo->findRequisitionById($id);
        if (is_null($CustomerInfo)) {
            return response()->json([
                'success' => false,
                'message' => 'Requisition Details',
                'data'    => null
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Requisition Details',
            'data'    => $CustomerInfo
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

       /*$this->customerInfoRepo->createCustomerInfo($request->except('_token', '_method'));*/

       $category =   $this->requisitionRepo->createRequisition($request->except('_token', '_method'));
       
       return response()->json([
        'success' => true,
        'message' => 'Requisition Stored',
        'data'    => $category
    ]);
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
            'categories' => $this->requisitionRepo->listRequisitions('name', 'asc', $id),
            'category' => $this->requisitionRepo->findRequisitionById($id)
        ]);
        /*return view('Category.categoryEdit', [
            'categories' => $this->customerInfoRepo->listCustomerInfos('name', 'asc', $id),
            'category' => $this->customerInfoRepo->findCustomerInfoById($id)
        ]);*/
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
        $list = $this->requisitionRepo->findRequisitionById($id);

        $update = new RequisitionRepository($list);
        $update->updateRequisition($request->except('_token', '_method'));

        return response()->json([
          'success' => true,
          'message' => 'Data updated successfully',
          'data'    => $list
          ]);
        return $list;



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
    public function destroy($id)
    {
        $category = $this->requisitionRepo->findRequisitionById($id);
       // $category->products()->sync([]);
        $category->delete();

        return response("data deleted successfully");
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function search(Request $request)
    {

      $search = $request->search;

     $categories = Requisition::orWhere('name', 'like','%'. $search.'%')
      ->orWhere('status', 'like','%'. $search.'%')
      ->orWhere('discount', 'like','%'. $search.'%')
     ->orderBy('id', 'desc')->get();

     return view('Category.categoryShow',compact('search','categories'));
    }
}
