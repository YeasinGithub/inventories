<?php

namespace App\Inventory\OrderDetails\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Inventory\OrderDetails\OrderDetail;
use Illuminate\Support\Collection;

interface OrderDetailRepositoryInterface extends BaseRepositoryInterface
{
    public function listOrderDetails(string $order = 'id',  $except = []) : Collection;

    public function createOrderDetail(array $params) : OrderDetail;

    public function updateOrderDetail(array $params) : OrderDetail;

    public function findOrderDetailById(int $id) : OrderDetail;

    public function deleteOrderDetail() : bool;

    public function rootOrderDetails(string $string);

}
?>