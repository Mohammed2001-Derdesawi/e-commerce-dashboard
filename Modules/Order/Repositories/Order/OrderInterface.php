<?php


namespace Modules\Order\Repositories\Order;

interface OrderInterface {
    public function getOrders($paginate=15,$relations=[],$params=['*']);
    public function findOrderById($order , $relations =[] ,$params=['*']);
    public function create($request);
    public function delete($id);
    public function update($request,$id);

}
