<?php

namespace App\Inventory\OrderTrackings\Exceptions;

class OrderTrackingNotFoundException extends \Exception
{

public function render($request)
    {
        return "OrderTracking salary Not Found";
    }


}
