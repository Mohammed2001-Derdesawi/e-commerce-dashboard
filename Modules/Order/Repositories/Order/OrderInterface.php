<?php


namespace Modules\Order\Repositories\Order;

interface OrderInterface {
    public function getOrders($paginate=15,$relations=[],$params=['*']);
    public function findOrderById($order , $relations =[] ,$params=['*']);


}
