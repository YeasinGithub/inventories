<?php

namespace App\Inventory\ReturnProducts\Requests;

use App\Inventory\Base\BaseFormRequest;

class CreateReturnProductRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'order_id' => ['required', 'unique:return_products']
        ];
    }
}
