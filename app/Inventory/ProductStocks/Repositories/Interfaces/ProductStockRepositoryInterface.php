<?php

namespace App\Inventory\ProductStocks\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Inventory\ProductStocks\ProductStock;
use Illuminate\Support\Collection;

interface ProductStockRepositoryInterface extends BaseRepositoryInterface
{
    public function listProductStocks(string $order = 'id',  $except = []) : Collection;

 	public function rootProductStocks(string $string);

    public function createProductStock(array $params) : ProductStock;

    public function updateProductStock(array $params) : ProductStock;

    public function findProductStockById(int $id) : ProductStock;

    public function deleteProductStock() : bool;

}
?>