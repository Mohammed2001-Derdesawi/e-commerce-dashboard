<?php 


namespace Modules\Order\ShipmentMethods;

use Exception;

use function PHPUnit\Framework\throwException;
use Illuminate\Support\Str;

class ShipmentMethodsFactory {
    public function create($method)
    {
        try{
            $path="\Modules\Order\ShipmentMethods\\";
            $method=Str::studly($method);
            return new $path.$method();

        }catch (Exception $e)
        {
            throwException($e);

        }
    }

}