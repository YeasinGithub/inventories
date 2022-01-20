<?php

namespace App\Inventory\ProductStockTransfers\Requests;

use App\Inventory\Base\BaseFormRequest;

class CreateStockTransferRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'product_id' => ['required', 'unique:stock_transfers']
        ];
    }
}
