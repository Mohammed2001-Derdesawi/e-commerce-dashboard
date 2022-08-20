<?php

namespace Modules\Order\Http\Controllers\Shipment\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Order\Entities\Shipment\Shipment;
use Modules\Order\Http\Requests\Shipment\Shipment as ShipmentRequest;
use Modules\Order\ShipmentMethods\ShipmentMethodsFactory;
use Modules\Order\Transformers\Shipment\ShipmentResource;
use Shippo;

class ShipmentApiController extends Controller
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
        return ((ShipmentResource::collection($this->shipmentfactory->index([],['id','icon','name','key','status'],request()->paginate))));
    }

    

   


    public function changestatus(Request $request)
    {
        $shipment=$this->shipmentfactory->changestatus($request->id);
        return ShipmentResource::make($shipment);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(ShipmentRequest $request)
    {
        
        $shipment=$this->shipmentfactory->update($request);
        if($shipment instanceof Shipment)
        return ShipmentResource::make($shipment);
 
         return response([
            'key'=>"key doens't exist please try again"
            

        ],240);
        

    }

}
