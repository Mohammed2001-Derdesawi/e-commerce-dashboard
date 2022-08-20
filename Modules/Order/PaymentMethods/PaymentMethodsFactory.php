<?php


namespace Modules\Order\PaymentMethods;

use Exception;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Str;
use Modules\Order\Entities\Payment\Payment;
use Modules\Order\Filters\Order\General\Search;
use Srmklive\PayPal\Facades\PayPal;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaymentMethodsFactory
{
    public function create($method)
    {
        try {
            $path = "Modules\Order\PaymentMethods\\";
            $method = Str::studly($method);
            $payment = $path . $method;

            return  new $payment();
        } catch (Exception $e) {
            throw new Exception($method . ' shipment method is not found');
        }
    }

    public function index($relations = [], $params = ['*'], $paginate = 10)
    {
        return app(Pipeline::class)
            ->send(Payment::query())
            ->through([
                Search::class

            ])
            ->thenReturn()
            ->with($relations)
            ->select($params)
            ->paginate($paginate);
    }



    public function changestatus($id)
    {
        $payment = $this->getPayment($id);
        $payment->status();
        $payment->save();
        return $payment;
    }

    public function update($request)
    {
        $payment = $this->getPayment($request->id);

        if ($payment->name == 'Paypal') {

            $paypal=$this->create('paypal');
           $payment=$paypal->updateApiCredentials($request,$payment);
            
            return [$payment,'Paypal'];
        }
        else
        {
            $stripe=$this->create('stripe');
            $payment=$stripe->updateApiCredentials($request,$payment);
            return [$payment,'Stripe'];

            
        }
    }

    public function getPayment($id)
    {
        return Payment::findOrFail($id);
    }
}
