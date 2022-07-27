<?php

namespace Modules\Order\Repositories\Order;

use App\Models\User;
use Exception;
use Illuminate\Pipeline\Pipeline as PipelinePipeline;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Modules\Order\Entities\Order\Order;
use Modules\Order\Filters\Order\Search;
use Modules\Order\Filters\Order\Status;
use Modules\Order\Repositories\Order\OrderInterface;
use Modules\Order\Transformers\Shippment\RateShippmentResource;
use Modules\Product\Repository\Product\ProductRepositoryInterface;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Support\Str;
use Modules\Order\ShipmentMethods\ShipmentMethodsFactory;
use Modules\Product\Entities\Varient\Varient;
use Modules\User\Entities\Cart\Cart;

class OrderRepository implements OrderInterface
{

    protected $user = null;
    protected $fromAddress = array(
        'name' => 'Shawn Ippotle',
        'street1' => '215 Clayton St.',
        'city' => 'San Francisco',
        'state' => 'CA',
        'zip' => '94117',
        'country' => 'US'
    );
    protected $productRepo;
    protected $shippment;
    protected $shipmentmethod;
    public function __construct(ProductRepositoryInterface $interface,ShipmentMethodsFactory $shipmentMethodsFactory)
    {
        $this->productRepo = $interface;
        $this->shipmentmethod=$shipmentMethodsFactory;
    }
    public function findOrderById($order, $relations = [], $params = ['*'])
    {
        return Order::with($relations)->select($params)->findOrFail($order);
    }

    public function getOrders($paginate = 15, $relations = [], $params = ['*'])
    {
        return app(PipelinePipeline::class)
            ->send(Order::query())
            ->through([
                Search::class,
                Status::class,

            ])
            ->thenReturn()
            ->select($params)
            ->with($relations)
            ->paginate($paginate);
    }

    public function create($request)
    {
         dd($request);
        $this->shippment=\Shippo_Shipment::retrieve('f482f31ae44f44588e21763c64b7f18e');
   
        $request = [
            'total' => 10,
            'addresses' => [
                1, 2
            ],
            'rate'=>[
                'days'=>3,
                'object_id'=>$this->shippment->rates[4]->object_id
            ]
            
        ];
     

        $this->getUser(['cart.varients']);
   
        $cart=$this->user->cart;

        $varients=[];
        foreach ($cart->varients as  $varient)
        {
            $varient->quantity-=$varient->pivot->qty;
            $varient->save();
            $varients[]=[
                'varient_id'=>$varient->id,
                'price'=>$varient->price,
                'quantity'=>$varient->pivot->qty
            ];
        }

       


        $this->getUser();
        $order = $this->user->orders()->create([
            'total' => $request['total'],
            'delivery_date' => Carbon::now()->addDays($request['rate']['days'])
        ]);
        $order->ordersdetails()->createMany($varients);
        $order->addresses()->attach($request['addresses']);
        $this->transaction($request);
    }
    public function transaction($request)
    {
        $selectrate =null;

        foreach ($this->shippment->rates as $rate)
        if($rate->object_id==$request['rate']['object_id'])
        {
            $selectrate=$rate;
            break;

        }


        // Purchase the desired rate.
        if($selectrate)
        $transaction = \Shippo_Transaction::create(array(
            'rate' => $selectrate["object_id"],
            'label_file_type' => "PDF",
            'async' => false
        ));
        session()->flush();
        dd($transaction);

        // // Retrieve label url and tracking number or error message
        // if ($transaction["status"] == "SUCCESS") {
        //     echo ($transaction["label_url"]);
        //     echo ("\n");
        //     echo ($transaction["tracking_number"]);
        // } else {
        //     echo ($transaction["messages"]);
        // }
    }
    public function delete($id)
    {

    }
    public function update($request, $id)
    {

    }

    public function getUserOrder($id)
    {

    }
    public function getUserOrders()
    {

    }
    public function userCancelOrder($id)
    {

    }
    public function rates($address, $varients,$method='shippo')
    {

        $shipment=$this->shipmentmethod->create($method);
        $this->getUser();
        $rates=$shipment->rates($address,$varients,$this->user);
        dd($rates);
        
    }
    public function track($id)
    {
    }
    public function payment($request)
    {

        $request=[
            'shipment_id'=>'f482f31ae44f44588e21763c64b7f18e',
             'rate'=>'a66efbf521fa473a81a499d2e1cceae1',
             'addresses'=>[1,2]
        ];
        session()->put('shipment_id',$request['shipment_id']);
        
        session()->put('rate',$request['rate']);
        session()->put('addresses',$request['addresses']);
        $data = []; //test data
        $data['items'] =
        [
            [
                'name' => 'ali',
                'price' => 50,
                'qty' => 2
            ]
        ];
      
        
        $data['return_url'] = route('shipment.payment.success');
        $data['cancel_url'] = route('shipment.payment.cancel');
        $data['total'] = 100;    // $request->total  with shipment amount
        $data['invoice_id']=Str::random(4);
        $data['invoice_description']=Str::random(10);
        $paypal = new ExpressCheckout();
        $response = $paypal->setExpressCheckout($data);
        $response = $paypal->setExpressCheckout($data,true);
        return redirect($response['paypal_link']);

        
    }
    public function paymentConfirm($request)
    {


     
        $paypal = new ExpressCheckout();
        $response = $paypal->getExpressCheckoutDetails($request->token);
        $request->merge(
            [
             'total'=>$response->AMT,
             'addresses' => [
                1, 2
            ],
            'rate'=>[
                'days'=>3,
                'object_id'=>$this->shippment->rates[4]->object_id
            ]
            ]
        );
        if(in_array(strtoupper($response['ACK']),['SUCCESS','SUCCESSWITHWARNING']))
        return $this->create($request);
         
        abort(500);    // or return to the same page with error 

    }
    public function cancelOrder($request)
    {
        
    }
    public function cancelPayment($request)
    {
       return redirect()->back()->with('message','Payment is cancel');        
    }

    public function getUser($relations=[])
    {
        Auth::login(User::find(1));
        $this->user = Auth::user()->load($relations);
    }
}
