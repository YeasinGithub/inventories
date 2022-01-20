<?php

namespace App\ProducStockTransfers\Exceptions;

class ProducStockTransferCreateErrorException extends \Exception
{
	public function render($request)
    {
        return "ProducStockTransfer Not Created..!";
    }
}
