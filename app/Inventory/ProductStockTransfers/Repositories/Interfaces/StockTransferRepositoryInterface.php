<?php

namespace App\Inventory\ProductStockTransfers\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Inventory\ProductStockTransfers\StockTransfer;
use Illuminate\Support\Collection;

interface StockTransferRepositoryInterface extends BaseRepositoryInterface
{
    public function listStockTransfers(string $order = 'id',  $except = []) : Collection;

    public function createStockTransfer(array $params) : StockTransfer;

    public function updateStockTransfer(array $params) : StockTransfer;

    public function findStockTransferById(int $id) : StockTransfer;

    public function deleteStockTransfer() : bool;

    public function rootStockTransfers(string $string);

}
?>