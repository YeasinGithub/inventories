<?php

namespace App\Providers;

use App\Inventory\Categories\Repositories\CategoryRepository;
use App\Inventory\Categories\Repositories\Interfaces\CategoryRepositoryInterface;


use App\Inventory\SubCategories\Repositories\SubCategoryRepository;
use App\Inventory\SubCategories\Repositories\Interfaces\SubCategoryRepositoryInterface;

use App\Inventory\SubSubCategories\Repositories\SubSubCategoryRepository;
use App\Inventory\SubSubCategories\Repositories\Interfaces\SubSubCategoryRepositoryInterface;

use App\Inventory\Employees\Repositories\EmployeeRepository;
use App\Inventory\Employees\Repositories\Interfaces\EmployeeRepositoryInterface;

use App\Inventory\UnitMeasures\Repositories\UnitMeasureRepository;
use App\Inventory\UnitMeasures\Repositories\Interfaces\UnitMeasureRepositoryInterface;

use Illuminate\Support\ServiceProvider;


use App\Inventory\Warehouses\Repositories\WarehouseRepository;
use App\Inventory\Warehouses\Repositories\Interfaces\WarehouseRepositoryInterface;

use App\Inventory\Products\Repositories\ProductRepository;
use App\Inventory\Products\Repositories\Interfaces\ProductRepositoryInterface;

use App\Inventory\ProductStocks\Repositories\ProductStockRepository;
use App\Inventory\ProductStocks\Repositories\Interfaces\ProductStockRepositoryInterface;

use App\Inventory\ProductStockTransfers\Repositories\StockTransferRepository;
use App\Inventory\ProductStockTransfers\Repositories\Interfaces\StockTransferRepositoryInterface;

use App\Inventory\Orders\Repositories\OrderRepository;
use App\Inventory\Orders\Repositories\Interfaces\OrderRepositoryInterface;

use App\Inventory\OrderDetails\Repositories\OrderDetailRepository;
use App\Inventory\OrderDetails\Repositories\Interfaces\OrderDetailRepositoryInterface;

use App\Inventory\OrderPickings\Repositories\OrderPickingRepository;
use App\Inventory\OrderPickings\Repositories\Interfaces\OrderPickingRepositoryInterface;

use App\Inventory\OrderTrackings\Repositories\OrderTrackingRepository;
use App\Inventory\OrderTrackings\Repositories\Interfaces\OrderTrackingRepositoryInterface;

use App\Inventory\ReturnProducts\Repositories\ReturnProductRepository;
use App\Inventory\ReturnProducts\Repositories\Interfaces\ReturnProductRepositoryInterface;

use App\Inventory\Requisitions\Repositories\RequisitionRepository;
use App\Inventory\Requisitions\Repositories\Interfaces\RequisitionRepositoryInterface;

use App\Inventory\RequisitionDetails\Repositories\RequisitionDetailRepository;
use App\Inventory\RequisitionDetails\Repositories\Interfaces\RequisitionDetailRepositoryInterface;

// use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

 
  public function register(){

			  $this->app->bind(
			  		CategoryRepositoryInterface::class,
			  		CategoryRepository::class
			  );

			  $this->app->bind(
            SubCategoryRepositoryInterface::class,
            SubCategoryRepository::class
        	);
			  $this->app->bind(
            SubSubCategoryRepositoryInterface::class,
            SubSubCategoryRepository::class
        	);
			  $this->app->bind(
            EmployeeRepositoryInterface::class,
            EmployeeRepository::class
        	);
              $this->app->bind(
            UnitMeasureRepositoryInterface::class,
            UnitMeasureRepository::class
            );
              $this->app->bind(
            WarehouseRepositoryInterface::class,
            WarehouseRepository::class
            );
              $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
            );
              $this->app->bind(
            ProductStockRepositoryInterface::class,
            ProductStockRepository::class
            );
              $this->app->bind(
            StockTransferRepositoryInterface::class,
            StockTransferRepository::class
            );
              $this->app->bind(
            OrderRepositoryInterface::class,
            OrderRepository::class
            );
              $this->app->bind(
            OrderDetailRepositoryInterface::class,
            OrderDetailRepository::class
            );
              $this->app->bind(
            OrderPickingRepositoryInterface::class,
            OrderPickingRepository::class
            );
              $this->app->bind(
            OrderTrackingRepositoryInterface::class,
            OrderTrackingRepository::class
            );
              $this->app->bind(
            ReturnProductRepositoryInterface::class,
            ReturnProductRepository::class
            );
              $this->app->bind(
            RequisitionRepositoryInterface::class,
            RequisitionRepository::class
            );
              $this->app->bind(
            RequisitionDetailRepositoryInterface::class,
            RequisitionDetailRepository::class
            );
	}

    // public function register(){

    //     $this->app->bind(
    //         CategoryRepositoryInterface::class,
    //         CategoryRepository::class
    //     );
        
    // }

}    

?>