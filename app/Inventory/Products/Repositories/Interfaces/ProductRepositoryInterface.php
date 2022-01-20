<?php

namespace App\Inventory\Products\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Inventory\Products\Product;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface extends BaseRepositoryInterface
{
    public function listProducts(string $order = 'id',  $except = []) : Collection;

    public function rootProducts(string $string);

    public function createProduct(array $params) : Product;

    public function updateProduct(array $params) : Product;

    public function findProductById(int $id) : Product;

    public function deleteProduct() : bool;

}
?>