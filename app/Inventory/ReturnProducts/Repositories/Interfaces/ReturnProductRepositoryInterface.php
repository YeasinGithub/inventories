<?php

namespace App\Inventory\ReturnProducts\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Inventory\ReturnProducts\ReturnProduct;
use Illuminate\Support\Collection;

interface ReturnProductRepositoryInterface extends BaseRepositoryInterface
{
    public function listReturnProducts(string $order = 'id',  $except = []) : Collection;

    public function createReturnProduct(array $params) : ReturnProduct;

    public function updateReturnProduct(array $params) : ReturnProduct;

    public function findReturnProductById(int $id) : ReturnProduct;

    public function deleteReturnProduct() : bool;

    public function rootReturnProducts(string $string);

}
?>