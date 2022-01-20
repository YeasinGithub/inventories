<?php

namespace App\Inventory\SubSubCategories\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Inventory\SubSubCategories\SubSubCategory;
use Illuminate\Support\Collection;

interface SubSubCategoryRepositoryInterface extends BaseRepositoryInterface
{
    public function listSubSubCategories(string $order = 'id',  $except = []) : Collection;

    public function createSubSubCategory(array $params) : SubSubCategory;

    public function updateSubSubCategory(array $params) : SubSubCategory;

    public function findSubSubCategoryById(int $id) : SubSubCategory;

    public function deleteSubSubCategory() : bool;

    public function rootSubSubCategories(string $string);

}
?>