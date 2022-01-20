<?php

namespace App\Inventory\Requisitions\Repositories\Interfaces;
use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Inventory\Requisitions\Requisition;
use Illuminate\Support\Collection;

interface RequisitionRepositoryInterface extends BaseRepositoryInterface
{
    public function listRequisitions(string $order = 'id', $except = []) : Collection;

    public function createRequisition(array $params) : Requisition;

    public function updateRequisition(array $params) : Requisition;

    public function findRequisitionById(int $id) : Requisition;

    public function deleteRequisition() : bool;


    public function rootRequisitions(string $string);


}
?>