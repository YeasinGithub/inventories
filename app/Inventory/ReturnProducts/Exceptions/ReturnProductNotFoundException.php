<?php

namespace App\Inventory\ReturnProducts\Exceptions;

class ReturnProductNotFoundException extends \Exception
{

public function render($request)
    {
        return "ReturnProduct salary Not Found";
    }


}
