<?php

namespace App\Inventory\Employees\Requests;

use App\Inventory\Base\BaseFormRequest;

class CreateEmployeeRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'unique:employees']
        ];
    }
}
