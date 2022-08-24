<?php

namespace Modules\Order\ShipmentMethods;

class Shippo implements ShipmentInterface
{
    public function create($request)
    {
    }
    public function rates($address, $varients, $user)
    {
        
    }
    public function transaction($shipment)
    {
        
    }

    public function cancel($order, $shipment_id)
    {
        
    }
    public function track($shipment_id = null)
    {
        
    }
}
