<?php

namespace App\ProducStockTransfers\Exceptions;

class ProducStockTransferUpdateErrorException extends \Exception
{
	public function render($request)
    {
        return "ProducStockTransfer Not Updated..!";
    }
}
