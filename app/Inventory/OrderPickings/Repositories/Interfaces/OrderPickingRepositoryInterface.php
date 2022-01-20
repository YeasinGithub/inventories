<?php

namespace App\Inventory\OrderPickings\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Inventory\OrderPickings\OrderPicking;
use Illuminate\Support\Collection;

interface OrderPickingRepositoryInterface extends BaseRepositoryInterface
{
    public function listOrderPickings(string $order = 'id',  $except = []) : Collection;

    public function createOrderPicking(array $params) : OrderPicking;

    public function updateOrderPicking(array $params) : OrderPicking;

    public function findOrderPickingById(int $id) : OrderPicking;

    public function deleteOrderPicking() : bool;

    public function rootOrderPickings(string $string);

}
?>