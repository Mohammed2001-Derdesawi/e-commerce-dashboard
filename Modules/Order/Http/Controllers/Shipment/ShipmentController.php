<?php

namespace Modules\Order\Http\Controllers\Shipment;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Order\ShipmentMethods\ShipmentMethodsFactory;

class ShipmentController extends Controller
{
    protected $shipmentfactory;
    public function __construct(ShipmentMethodsFactory $factory)
    {
        $this->shipmentfactory=$factory;

    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('order::ShipmentMethods.index');
    }

    // public function update(Request $request)
    // {
        
    //     $shipment=$this->shipmentfactory->update($request);
    //     // if($shipment instanceof Shipment)
    //     // return ShipmentResource::make($shipment);

    //     // return $shipment;

    // }


}
