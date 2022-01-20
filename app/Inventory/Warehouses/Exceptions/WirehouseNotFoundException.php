<?php

namespace App\Inventory\Wirehouses\Exceptions;

class WirehouseNotFoundException extends \Exception
{

public function render($request)
    {
        return "Wirehouse Not Found";
    }


}
