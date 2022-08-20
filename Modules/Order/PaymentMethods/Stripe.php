<?php

namespace Modules\Order\PaymentMethods;

use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Modules\Order\ShipmentMethods\Shippo;
use Shippo_Rate;
use Srmklive\PayPal\Services\ExpressCheckout;
use Stripe\Charge;
use Stripe\Stripe as StripeStripe;

class Stripe implements PyamentInterface{
    public function payment($request,$user)
    {
        $request=[
            'shipment_number'=>'f86ddba947ac4357a841e4a0b87a7b06',
             'rate'=>'b5c3c41238544a7ebeb28e27ea74d8e1',
             'addresses'=>[1,2]
        ];
        $rate=Shippo_Rate::retrieve($request['rate']);
        session()->put('shipment_number',$request['shipment_number']);

        session()->put('rate',$request['rate']);
        session()->put('addresses',$request['addresses']);
        $total=0;
        if($user->cart!=null)
        {
            foreach ($user->cart->varients as  $varient)
            {
    
               
                  $total+=$varient->price*$varient->pivot->qty;
    
    
            }
       

        
         }
         
         $total+=$rate->amount;
        if($total>$rate->amount)
        {
            session()->put('total',$total);
            return view('order::Stripe',compact('total'));
        }
        return back(); // if cart is empty
        
 
        // $request=[
        //     'shipment_number'=>'a1e7c04bb753445bb0a53aa892bb8240',
        //      'rate'=>'f40630cd301d4a808415ce28ac14fbb7',
        //      'addresses'=>[1,2]
        // ];

        // $rate=Shippo_Rate::retrieve($request['rate']);
        // session()->put('shipment_number',$request['shipment_number']);

        // session()->put('rate',$request['rate']);
        // session()->put('addresses',$request['addresses']);
    }

    public function success($request){
        if(session()->get('total') > 0)
        {
            StripeStripe::setApiKey(config('services.stripe.secret'));
            $res=Charge::create([
                'amount'=>round(session()->get('total')),
                 'currency'=>'USD',
                 'source'=> $request->stripeToken,
                 'description'=>'Test Payment '
            ]);
            Session::flash('success','Payment has been successfully');
            return $res;
        }
       
      


    }
    public function cancel(){

    }
    public function refuned($payment_id){

    }

    public function updateApiCredentials($request,$payment){
        $ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.stripe.com/v1/tokens");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=4242424242424242&card[exp_month]=12&card[exp_year]=2017&card[cvc]=123");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_USERPWD, $request->key . ":");

$response = json_decode(curl_exec($ch),true);

if( curl_errno($ch) ){
    echo 'Error:' . curl_error($ch);
}
curl_close ($ch);

if(substr($response["error"]["message"],0, 24 ) == "Invalid API Key provided"){
    return 'falid';
    
            
    }

    $payment->update([
        'key'=>$request->key
    ]);
    return $payment;

   
    

}


}
