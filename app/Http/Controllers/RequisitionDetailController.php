<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Requestss;
use App\Inventory\RequisitionDetails\Requests\CreateRequisitionDetailRequest;
use App\Inventory\RequisitionDetails\Repositories\RequisitionDetailRepository;
use App\Inventory\RequisitionDetails\Repositories\Interfaces\RequisitionDetailRepositoryInterface;
use App\Inventory\RequisitionDetails\RequisitionDetail;

class RequisitionDetailController extends Controller
{
    private $requisitionDetailRepo;
  /******************************/

 public function __construct(RequisitionDetailRepositoryInterface $requisitiondetailRepository)
  {
    $this->requisitionDetailRepo = $requisitiondetailRepository;
  }

 
public function index()
 {      
    
  $list = $this->requisitionDetailRepo->listRequisitionDetails('created_at', 'desc');
           return response()->json([
      'success' => true,
      'message' => 'RequisitionDetail List',
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
        $CustomerInfo = $this->requisitionDetailRepo->findRequisitionDetailById($id);
        if (is_null($CustomerInfo)) {
            return response()->json([
                'success' => false,
                'message' => 'RequisitionDetail Details',
                'data'    => null
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'RequisitionDetail Details',
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

       $category =   $this->requisitionDetailRepo->createRequisitionDetail($request->except('_token', '_method'));
       
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
            'categories' => $this->requisitionDetailRepo->listRequisitionDetails('name', 'asc', $id),
            'category' => $this->requisitionDetailRepo->findRequisitionDetailById($id)
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
        $list = $this->requisitionDetailRepo->findRequisitionDetailById($id);

        $update = new RequisitionDetailRepository($list);
        $update->updateRequisitionDetail($request->except('_token', '_method'));

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
        $category = $this->requisitionDetailRepo->findRequisitionDetailById($id);
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
