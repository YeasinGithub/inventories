<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Requestss;
use App\Inventory\UnitMeasures\Requests\CreateUnitMeasureRequest;
use App\Inventory\UnitMeasures\UnitMeasure;
use App\Inventory\UnitMeasures\Repositories\UnitMeasureRepository;
use App\Inventory\UnitMeasures\Repositories\Interfaces\UnitMeasureRepositoryInterface;

class UnitMeasureController extends Controller
{
    /******************************/
  private $unitmeasureRepo;
  /******************************/

 public function __construct(UnitMeasureRepositoryInterface $unitmeasureRepository)
  {
    $this->unitmeasureRepo = $unitmeasureRepository;
  }
public function index()
 {  	
 	
 $list = $this->unitmeasureRepo->listUnitMeasures('created_at');
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
        return view('UnitMeasure.create', [
            'unitmeasures' => $this->unitmeasureRepo->listUnitMeasures('name', 'asc')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createUnitMeasureRequest $request)
    {
       /*$categories = new Category();
       $categories->name = $request->name;
       $categories->save();*/
//dd($request->all());

       $this->unitmeasureRepo->createUnitMeasure($request->except('_token', '_method'));
    }
/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('UnitMeasure.edit', [
            'unitmeasures' => $this->unitmeasureRepo->listUnitMeasures('name', 'asc', $id),
            'unitmeasure' => $this->unitmeasureRepo->findUnitMeasureById($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCategoryRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(UpdateUnitMeasureRequest $request, $id)
    {
       // @dd($request->all());
        $unitmeasure = $this->unitmeasureRepo->findUnitMeasureById($id);

        $update = new UnitMeasureRepository($unitmeasure);
        $update->updateUnitMeasure($request->except('_token', '_method'));

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
        $unitmeasure = $this->unitmeasureRepo->findUnitMeasureById($id);
       // $category->products()->sync([]);
        $unitmeasure->delete();

       // request()->session()->flash('message', 'Delete successful');
       // return redirect()->route('admin.categories.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
}
