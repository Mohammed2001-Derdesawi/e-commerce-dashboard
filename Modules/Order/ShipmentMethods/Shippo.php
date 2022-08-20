<?php

namespace Modules\Order\ShipmentMethods;


use Shippo_Shipment;
use Modules\Product\Repository\Product\ProductRepository;
use Modules\Product\Repository\Product\ProductRepositoryInterface;
use Shippo_Rate;
use Shippo_Track;

class Shippo implements ShipmentInterface {


    protected $productRepo;
    protected $fromAddress = array(
        'name' => 'Shawn Ippotle',
        'street1' => '215 Clayton St.',
        'city' => 'San Francisco',
        'state' => 'CA',
        'zip' => '94117',
        'country' => 'US'
    );

    public function __construct()
    {
        $this->productRepo =new ProductRepository();
    }
    public function create($request)
    {
        $shipment=Shippo_Shipment::retrieve(session()->get('shipment_number')); // $request->shipmet_id;


        return $shipment;

    }
    public function transaction($shipment)
    {


        foreach ($shipment->rates as $rate)
        if($rate->object_id==session()->get('rate'))
        {
            $transaction = \Shippo_Transaction::create(array(
                'rate' => $rate["object_id"],
                'label_file_type' => "PDF",
                'async' => false
            ));

             return $rate;

        }




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
    public function track($shipment_id=null)
    {
       dd(Shippo_Track::get_status($this->create($shipment_id)));
    }
}
