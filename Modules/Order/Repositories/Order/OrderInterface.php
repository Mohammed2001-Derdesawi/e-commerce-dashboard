<?php


namespace Modules\Order\Repositories\Order;

use Illuminate\Support\Facades\Request;

interface OrderInterface {
    public function getOrders($paginate=15,$relations=[],$params=['*']);
    public function findOrderById($order , $relations =[] ,$params=['*']);
    public function create($request);
    public function delete($id);
    public function update($request,$id);
    public function getUserOrder($id);
    public function getUserOrders();
    public function rates($address,$varients,$method='shippo');
    public function track($id);
    public function payment($request);
    public function cancelOrder($id);
    public function cancelPayment($request);
    public function paymentConfirm($request);


}
