<?php

namespace App\Inventory\UnitMeasures\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Inventory\UnitMeasures\UnitMeasure;
use Illuminate\Support\Collection;

interface UnitMeasureRepositoryInterface extends BaseRepositoryInterface
{
    public function listUnitMeasures(string $order = 'id',  $except = []) : Collection;

    public function createUnitMeasure(array $params) : UnitMeasure;

    public function updateUnitMeasure(array $params) : UnitMeasure;

    public function findUnitMeasureById(int $id) : UnitMeasure;

    public function deleteUnit() : bool;

    public function rootUnitMeasures(string $string);

}
?>