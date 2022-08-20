<?php


namespace Modules\Order\PaymentMethods;

interface PyamentInterface {
    public function payment($request,$user);
    public function success($request);
    public function cancel();
    public function refuned($payment_id);
    public function updateApiCredentials($request,$payment);

}
