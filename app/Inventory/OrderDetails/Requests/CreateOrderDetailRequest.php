<?php

namespace App\Inventory\OrderDetails\Requests;

use App\Inventory\Base\BaseFormRequest;

class CreateOrderDetailRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'order_id' => ['required', 'unique:order_details']
        ];
    }
}
