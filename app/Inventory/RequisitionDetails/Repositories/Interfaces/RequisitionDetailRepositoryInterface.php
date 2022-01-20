<?php

namespace App\Inventory\RequisitionDetails\Repositories\Interfaces;
use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Inventory\RequisitionDetails\RequisitionDetail;
use Illuminate\Support\Collection;

interface RequisitionDetailRepositoryInterface extends BaseRepositoryInterface
{
    public function listRequisitionDetails(string $order = 'id', $except = []) : Collection;

    public function createRequisitionDetail(array $params) : RequisitionDetail;

    public function updateRequisitionDetail(array $params) : RequisitionDetail;

    public function findRequisitionDetailById(int $id) : RequisitionDetail;

    public function deleteRequisitionDetail() : bool;


    public function rootRequisitionDetails(string $string);


}
?>