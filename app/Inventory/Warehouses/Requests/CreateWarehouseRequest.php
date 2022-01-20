<?php

namespace App\Inventory\Warehouses\Requests;

use App\Inventory\Base\BaseFormRequest;

class CreateWarehouseRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'unique:categories']
        ];
    }
}
