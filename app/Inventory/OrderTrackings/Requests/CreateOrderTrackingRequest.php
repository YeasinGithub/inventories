<?php

namespace App\Inventory\OrderTrackings\Requests;

use App\Inventory\Base\BaseFormRequest;

class CreateOrderTrackingRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'order_id' => ['required', 'unique:order_trackings']
        ];
    }
}
