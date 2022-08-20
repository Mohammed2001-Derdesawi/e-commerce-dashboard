<?php

namespace Modules\Order\Http\Controllers\Payment;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Order\Repositories\Order\OrderInterface;

class PaymentController extends Controller
{
    protected $orderRepo;
    public function __construct(OrderInterface $payment)
    {
        $this->orderRepo = $payment;
    }

  public function index()
  {
    return view('order::PaymentMethods.index');
  }
  public function payment(Request $request)
  {
    return $this->orderRepo->payment($request);
  }
  public function success(Request $request)
  {
    return $this->orderRepo->paymentConfirm($request);
  }

  public function getUserOrder($id){
    return $this->orderRepo->getUserOrder($id);
  }
  public function getUserOrders(){
    return $this->orderRepo->getUserOrders();
  }
}
