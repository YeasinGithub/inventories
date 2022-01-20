<?php

namespace App\Inventory\SubCategories\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Inventory\SubCategories\SubCategory;
use Illuminate\Support\Collection;

interface SubCategoryRepositoryInterface extends BaseRepositoryInterface
{
    public function listSubCategories(string $order = 'id',  $except = []) : Collection;

    public function createSubCategory(array $params) : SubCategory;

    public function updateSubCategory(array $params) : SubCategory;

    public function findSubCategoryById(int $id) : SubCategory;

    public function deleteSubCategory() : bool;

    public function rootSubCategories(string $string);

}
?>