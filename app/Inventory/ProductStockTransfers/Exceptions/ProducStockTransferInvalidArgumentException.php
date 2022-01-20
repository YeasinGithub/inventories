<?php

namespace App\Inventory\ProducStockTransfers\Exceptions;

use Doctrine\Instantiator\Exception\InvalidArgumentException;

class ProducStockTransferInvalidArgumentException extends InvalidArgumentException
{
	public function render($request)
    {
        return "ProducStockTransfer Invalid Argument";
    }
}
