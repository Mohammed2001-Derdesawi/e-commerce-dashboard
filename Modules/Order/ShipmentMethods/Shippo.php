<?php 

namespace Modules\Order\ShipmentMethods;

use Modules\Product\Repository\Product\ProductRepositoryInterface;

class Shippo implements ShipmentInterface {


    protected $productRepo;

    public function __construct(ProductRepositoryInterface $interface)
    {
        $this->productRepo = $interface;
    }
    public function create($request)
    {
        $shipment=\Shippo_Shipment::retrieve('f482f31ae44f44588e21763c64b7f18e'); // $request->shipmet_id;
        return $shipment;
        
    }
    public function transaction($shipment,$request)
    {
        $selectrate =null;

        foreach ($shipment->rates as $rate)
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
       
         return $transaction;
    }
    public function cancel($order,$shipment_id)
    {
        
    }
    public function rates($address, $varients,$user)
    {
        $cart = [
            '1' => [
                'product_id' => 1,
                'quantity' => 2
            ]
        ];
        $varients = $cart;
        $address = $user->addresses()->where('address_type', 'shippment')->findOrFail($address);
        $toAddress = array(
            'name' => $user->name,
            'street1' => $address->street1,
            'city' => $address->city,
            'state' => $address->state,
            'zip' => $address->zip,
            'country' => $address->country,
            'phone' => $address->phone,
        );
        $parcels = [];

        foreach ($varients as $varient) {

            $product = $this->productRepo->getByID($varient['product_id'], ['length', 'width', 'height', 'weight'], [], false);
            for ($i = 1; $i <= $varient['quantity']; $i++) {
                array_push($parcels, [
                    'length' => $product->length,
                    'width' => $product->width,
                    'height' => $product->height,
                    'distance_unit' => 'in',
                    'weight' => $product->weight,
                    'mass_unit' => 'lb',

                ]);
            }
        }
        $shipment = \Shippo_Shipment::create(
            array(
                'address_from' => $this->fromAddress,
                'address_to' => $toAddress,
                'parcels' => $parcels,
                'async' => false
            )
        );
      
        return $shipment->rates;

    } 
    public function track($shipment_id)
    {
        

    }
}
 