<?php

namespace App\Inventory\Employees\Repositories\Interfaces;

use Jsdecena\Baserepo\BaseRepositoryInterface;
use App\Inventory\Employees\Employee;
use Illuminate\Support\Collection;

interface EmployeeRepositoryInterface extends BaseRepositoryInterface
{
    public function listEmployees(string $order = 'id',  $except = []) : Collection;

    public function createEmployee(array $params) : Employee;

    public function updateEmployee(array $params) : Employee;

    public function findEmployeeById(int $id) : Employee;

    public function deleteEmployee() : bool;

    public function rootEmployees(string $string);

}
?>