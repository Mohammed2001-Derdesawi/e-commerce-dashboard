<?php


namespace Modules\Order\ShipmentMethods;

use Exception;

use Illuminate\Support\Str;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Http;
use Modules\Order\Entities\Shipment\Shipment;
use Modules\Order\Filters\Order\General\Search;
use Shippo_ApiRequestor;
use Shippo_AuthenticationError;
use Shippo_Parcel;
use Shippo_ShipmentTest;

class ShipmentMethodsFactory {
    public function create($method)
    {
        try{
            $path="Modules\Order\ShipmentMethods\\";
            $method=Str::studly($method);
            $shipment=$path.$method;

            return  new $shipment();

        }catch (Exception $e)
        {
            throw new Exception($method.' shipment method is not found');

        }
    }
    public function index($relations=[],$params=['*'],$paginate=10)
    {
        return app(Pipeline::class)
        ->send(Shipment::query())
        ->through([
           Search::class

        ])
        ->thenReturn()
        ->with($relations)
        ->select($params)
        ->paginate($paginate);
    }

   
   
    public function changestatus($id){
        $shipment=$this->getShipment($id);
        $shipment->status();
        $shipment->save();
        return $shipment;
    }
    public function update($request)
    {
        \Shippo::setApiKey($request->key);
        
        try{
            Shippo_Parcel::create(array(
                'length' => '5',
                'width' => '5',
                'height' => '5',
                'distance_unit' => 'cm',
                'weight' => '2',
                'mass_unit' => 'lb',
                'template' => '',
                'metadata' => 'Customer ID 123456'
            ));   
      
           
          


        }catch(Shippo_AuthenticationError $e)
        {
            return 'key is not valid';

        }
        $shipment=$this->getShipment($request->id);
        $shipment->update([
            'key'=>$request->key,
            'status'=>$request->status?1:0,

        ]);

        return $shipment;



    }

    public function getShipment($id)
    {
        return Shipment::findOrFail($id);
    }

}
