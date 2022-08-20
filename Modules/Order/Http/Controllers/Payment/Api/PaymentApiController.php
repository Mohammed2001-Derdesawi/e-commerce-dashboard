<?php

namespace Modules\Order\Http\Controllers\Payment\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Order\Entities\Payment\Payment;
use Modules\Order\PaymentMethods\PaymentMethodsFactory;
use Modules\Order\PaymentMethods\Paypal;
use Modules\Order\PaymentMethods\Stripe;
use Modules\Order\Transformers\Payment\PaymentResource;

use function PHPUnit\Framework\returnSelf;

class PaymentApiController extends Controller
{
    protected $paymentfactory;
    public function __construct(PaymentMethodsFactory $factory)
    {
        $this->paymentfactory=$factory;

    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return PaymentResource::collection($this->paymentfactory->index([],['*'],request()->paginate));
    }



    public function changestatus(Request $request)
    {
        $payment=$this->paymentfactory->changestatus($request->id);
        return PaymentResource::make($payment);
    }




   /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        list($payment,$message)=$this->paymentfactory->update($request);
        if($payment instanceof Payment)
        return PaymentResource::make($payment);
        
        return response()->json([
            'message'=>'Api Credentials for '.$message . " is not correct!",
        ],220);

    }

     
   
}
