<?php

namespace Modules\Order\Http\Controllers\Payment;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Order\Repositories\Order\OrderInterface;

class PaymentController extends Controller
{
    protected $orderRepo;
    public function __construct(OrderInterface $payment)
    {
        $this->orderRepo = $payment;
    }
  public function payment(Request $request)
  {
    return $this->orderRepo->payment($request);
  }
  public function success(Request $request)
  {
    return $this->orderRepo->paymentConfirm($request);
  }
}
