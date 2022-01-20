<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Requestss;
use App\Inventory\Warehouses\Requests\CreateWarehouseRequest;
use App\Inventory\Warehouses\Warehouse;
use App\Inventory\Warehouses\Repositories\WarehouseRepository;
use App\Inventory\Warehouses\Repositories\Interfaces\WarehouseRepositoryInterface;

class WarehouseController extends Controller
{
    /******************************/
  private $warehouseRepo;
  /******************************/

 public function __construct(WarehouseRepositoryInterface $warehouseRepository)
  {
    $this->warehouseRepo = $warehouseRepository;
  }
public function index()
 {  	
 	
 $list = $this->warehouseRepo->listWarehouses('created_at');
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
        return view('Warehouse.create', [
            'warehouses' => $this->warehouseRepo->listWarehouses('name', 'asc')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(createWarehouseRequest $request)
    {
       /*$categories = new Category();
       $categories->name = $request->name;
       $categories->save();*/
//dd($request->all());

       $this->warehouseRepo->createWarehouse($request->except('_token', '_method'));
    }
/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Warehouse.edit', [
            'warehouses' => $this->warehouseRepo->listWarehouses('name', 'asc', $id),
            'warehouse' => $this->warehouseRepo->findWarehouseById($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCategoryRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(UpdateWarehouseRequest $request, $id)
    {
       // @dd($request->all());
        $warehouse = $this->warehouseRepo->findWarehouseById($id);

        $update = new WarehouseRepository($warehouse);
        $update->updateWarehouse($request->except('_token', '_method'));

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
        $warehouse = $this->warehouseRepo->findWarehouseById($id);
       // $category->products()->sync([]);
        $warehouse->delete();

       // request()->session()->flash('message', 'Delete successful');
       // return redirect()->route('admin.categories.index');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
}
