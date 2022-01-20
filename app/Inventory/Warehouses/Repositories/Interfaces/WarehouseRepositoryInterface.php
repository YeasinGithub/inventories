<?php

namespace App\Inventory\Warehouses\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Inventory\Warehouses\Warehouse;
use Illuminate\Support\Collection;

interface WarehouseRepositoryInterface extends BaseRepositoryInterface
{
    public function listWarehouses(string $order = 'id',  $except = []) : Collection;

    public function createWarehouse(array $params) : Warehouse;

    public function updateWarehouse(array $params) : Warehouse;

    public function findWarehouseById(int $id) : Warehouse;

    public function deleteWareHouse() : bool;

    public function rootWarehouses(string $string);

}
?>