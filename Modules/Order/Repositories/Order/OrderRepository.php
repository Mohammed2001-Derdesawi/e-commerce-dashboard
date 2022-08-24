<?php

namespace Modules\Order\Repositories\Order;

use App\Models\User;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Pipeline\Pipeline as PipelinePipeline;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Modules\Order\Entities\Order\Order;
use Modules\Order\Filters\Order\Search;
use Modules\Order\Filters\Order\Status;
use Modules\Order\Repositories\Order\OrderInterface;
use Modules\Order\Transformers\Shippment\RateShippmentResource;
use Modules\Product\Repository\Product\ProductRepositoryInterface;
use Srmklive\PayPal\Services\ExpressCheckout;
use Illuminate\Support\Str;
use Modules\Order\Entities\Payment\Payment;
use Modules\Order\Entities\Shipment\Shipment;
use Modules\Order\PaymentMethods\PaymentMethodsFactory;
use Modules\Order\PaymentMethods\Paypal;
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
    protected $paymentmethod;
    public function __construct(ProductRepositoryInterface $interface, ShipmentMethodsFactory $shipmentMethodsFactory, PaymentMethodsFactory $paymentfactory)
    {
        $this->productRepo = $interface;
        $this->shipmentmethod = $shipmentMethodsFactory;
        $this->paymentmethod = $paymentfactory;
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

        $shipment = $this->shipmentmethod->create('shippo')->create($request);



        $rate = $this->transaction($shipment);
        $this->getUser(['cart.varients']);

        $varients = [];
        foreach ($this->user->cart->varients as  $varient) {
            $varient->quantity -= $varient->pivot->qty;
            $varient->save();
            $varients[] = [
                'varient_id' => $varient->id,
                'price' => $varient->price,
                'quantity' => $varient->pivot->qty
            ];
        }




        $order = $this->user->orders()->create([
            'total' => $request['total']??session()->get('total'),
            'payment_id' => session()->get('payment_id'),
            'shipment_id' => session()->get('shipment_id'),
            'shipment_number' => session()->get('shipment_number'),
            'invoice_number' => config('paypal.invoice_prefix') . $this->user->id,
            'delivery_date' => Carbon::now()->addDays($rate->estimated_days)
        ]);
        $order->ordersdetails()->createMany($varients);
        $order->addresses()->attach(session()->get('addresses'));
        $this->user->cart()->delete();
        return dd('order crated successfull');
    }
    public function transaction($shipment)
    {

        $rate = $this->shipmentmethod->create('shippo')->transaction($shipment);
        return $rate;
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
        $this->getUser();
        return $this->user->orders()->findOrFail($id);
    }
    public function getUserOrders()
    {
        $this->getUser();
        return $this->user->orders();
    }
    public function userCancelOrder($id)
    {
    }
    public function rates($address, $varients, $method = 'shippo')
    {

        $shipment = $this->shipmentmethod->create($method);
        $this->getUser();
        $rates = $shipment->rates($address, $varients, $this->user);
        return $rates;
    }
    public function track($id)
    {
        $shipment = $this->shipmentmethod->create('shippo');
        $shipment->track();
    }

    public function payment($request)
    {
        $payment_method = $this->paymentmethod->getPayment(1);
        $shipment = $this->shipmentmethod->getShipment(1);
        session()->put('payment_id', $payment_method->id);
        session()->put('shipment_id', $shipment->id);
        session()->put('payment_method','paypal');   //$request->payment_method

        // $payment = $this->paymentmethod->create($request->payment_method);
        $payment = $this->paymentmethod->create('paypal');

        // $request->payment_id
        $this->getUser(['cart.varients.product']);
        if($payment instanceof Paypal)
        return  redirect($payment->payment($request, $this->user));
        elseif ($request->payment_method='stripe')
        return $payment->payment($request,$this->user);
    }

    public function paymentConfirm($request)
    {
        $payment = $this->paymentmethod->create(session()->get('payment_method'));
        
        $res = $payment->success($request);
        if ($payment)
            return $this->create($res);

        abort(500);    // or return to the same page with error

    }
    public function cancelOrder($request)
    {
    }
    public function cancelPayment($request)
    {
        return redirect()->back()->with('message', 'Payment is cancel');
    }

    public function getUser($relations = [])
    {
        Auth::login(User::find(1));

        $this->user = Auth::user()->load($relations);
    }
}
