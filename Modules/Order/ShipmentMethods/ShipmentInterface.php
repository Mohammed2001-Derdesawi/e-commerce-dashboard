<?php 
namespace Modules\Order\ShipmentMethods;

interface ShipmentInterface {
    
    public function create($request);
    public function rates($address, $varients,$user);
    public function transaction($shipment,$request);
    public function cancel($order,$shipment_id);
    public function track($shipment_id);



}
