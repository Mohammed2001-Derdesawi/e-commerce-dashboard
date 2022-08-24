<?php

namespace Modules\Order\PaymentMethods;

use Illuminate\Support\Str;
use Modules\Order\ShipmentMethods\Shippo;
use Shippo_Rate;
use Srmklive\PayPal\Services\ExpressCheckout;
use Symfony\Component\CssSelector\Parser\Token;
use TheSeer\Tokenizer\Token as TokenizerToken;

class Paypal implements PyamentInterface{
    public function payment($request,$user)
    {
 
        $request=[
            'shipment_number'=>'a1e7c04bb753445bb0a53aa892bb8240',
             'rate'=>'f40630cd301d4a808415ce28ac14fbb7',
             'addresses'=>[1,2]
        ];

        $rate=Shippo_Rate::retrieve($request['rate']);
        session()->put('shipment_number',$request['shipment_number']);

        session()->put('rate',$request['rate']);
        session()->put('addresses',$request['addresses']);

        $data = []; //test data
        $total=0;
        if($user->cart!=null)
        {
            foreach ($user->cart->varients as  $varient)
            {
    
                $data['items'][]=
    
    
                [
                    'name' => $varient->product->name,
                    'price' => $varient->price,
                    'qty' => $varient->pivot->qty
    
                ];
                  $total+=$varient->price*$varient->pivot->qty;
    
    
            }
    
    
    
            $data['return_url'] = route('orders.payment.success');
            $data['cancel_url'] = route('orders.payment.cancel');
            $data['shipping']=$rate->amount;
            $data['total']=$rate->amount+$total;
            $data['subtotal'] =$total;
            $data['invoice_id']=config('paypal.invoice_prefix').$user->id;
            $data['invoice_description']='User checkout';
            $paypal = new ExpressCheckout();
            $response = $paypal->setExpressCheckout($data);
            $response = $paypal->setExpressCheckout($data,true);
            return $response['paypal_link'];
        }

        return '/admin/payments/methods';
       
        

    }

    public function success($request){
        $paypal = new ExpressCheckout();
        $response = $paypal->getExpressCheckoutDetails($request->token);
        $response=array_merge($response,['total'=>$response['AMT']]);

        if(in_array(strtoupper($response['ACK']),['SUCCESS','SUCCESSWITHWARNING']))
        return $response;

        return false;

    }
    public function cancel(){

    }
    public function refuned($payment_id){

    }

    public function updateApiCredentials($request,$payment)
    {
        $paypal = new ExpressCheckout;

        $ss = $paypal->setApiCredentials([
            'mode' => 'sandbox',
            'sandbox' => [
                'username'    => $request->username,
                'password'    => $request->password,
                'secret'      => $request->secret,
                'certificate' => $request->certificate ?? '',
                'app_id'      => 'APP-80W284485P519543T', // Used for testing Adaptive Payments API in sandbox mode
            ],

            'payment_action' => 'Authorization', // Can only be 'Sale', 'Authorization' or 'Order'
            'currency'       => $request->currency,
            'billing_type'   => 'MerchantInitiatedBilling',
            'notify_url'     => '', // Change this accordingly for your application.
            'locale'         => '', // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
            'validate_ssl'   => true, // Validate SSL when creating api client.
            // 'app-id'=>$request->app_id, in live mode

        ]);
        $data['items'][] =


            [
                'name' => 'test',
                'price' => 100,
                'qty' => 1

            ];

        $data['return_url'] = route('orders.payment.success');
        $data['cancel_url'] = route('orders.payment.cancel');

        $data['total'] = 100;
        $data['invoice_id'] = 'test';
        $data['invoice_description'] = 'User checkout';


        $res = $paypal->setExpressCheckout($data);
        $res = $paypal->setExpressCheckout($data, true);


        if ($res['ACK'] == 'Failure') {

           return 'falid';
        }
        $payment->update([
            'key' => $request->key,
            'status' => $request->status ? 1 : 0,
            'secret' => $request->secret,
            'password' => $request->password,
            'username' => $request->username,
            'certificate' => $request->certificate,
            'currency' => $request->currency

        ]);

        return $payment;

    }
}
