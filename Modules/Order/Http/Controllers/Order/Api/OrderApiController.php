<?php

namespace Modules\Order\Http\Controllers\Order\Api;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Modules\Order\Transformers\Order\OrderResource;
use Modules\Order\Repositories\Order\OrderInterface;
use Modules\Order\Transformers\Shipment\RateShippmentResource;

class OrderApiController extends Controller
{
    private $orderRepo;

    public function __construct(OrderInterface $orderInterface)
    {
        $this->orderRepo=$orderInterface;

    }


    public function getOrders()
    {

        return OrderResource::collection($this->orderRepo->getOrders(
          (int)request()->paginate  ,
        ['user:id,name']
       ,
        ['id','created_at','updated_at','user_id','status'],


        ));

    }
    public function getrates(Request $request){
        return RateShippmentResource::collection($this->orderRepo->rates($request->address,[],'shippo'));

    }


}
