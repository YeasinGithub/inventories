<?php

namespace App\Inventory\ProducStockTransfers\Exceptions;

class ProducStockTransferNotFoundException extends \Exception
{

public function render($request)
    {
        return "ProducStockTransfer Not Found";
    }


}
