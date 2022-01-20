<?php

namespace App\Inventory\OrderTrackings\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Inventory\OrderTrackings\OrderTracking;
use Illuminate\Support\Collection;

interface OrderTrackingRepositoryInterface extends BaseRepositoryInterface
{
    public function listOrderTrackings(string $order = 'id',  $except = []) : Collection;

    public function createOrderTracking(array $params) : OrderTracking;

    public function updateOrderTracking(array $params) : OrderTracking;

    public function findOrderTrackingById(int $id) : OrderTracking;

    public function deleteOrderTracking() : bool;

    public function rootOrderTrackings(string $string);

}
?>