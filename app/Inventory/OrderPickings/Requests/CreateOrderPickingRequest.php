<?php

namespace App\Inventory\OrderPickings\Requests;

use App\Inventory\Base\BaseFormRequest;

class CreateOrderPickingRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'order_id' => ['required', 'unique:order_pickings']
        ];
    }
}
