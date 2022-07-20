<?php

namespace Modules\Product\Repository\Cart;

use Modules\Product\Entities\Gallery\Gallery;

class CartRepository implements CartRepositoryInterface {

    public function store($data)
    {
        $varient = $data;
        $mainimage = Gallery::where('product_id' , $varient->product_id)->where('is_main' , 1)->first()->path;
        $cart = session()->get('cart');

//        dd(session()->get('cart'));
        if(!$cart) {
            $cart = [
                $varient->id => [
                    "id" => $varient->id,
                    "name" => $varient->product->name,
                    "quantity" => 1,
                    "price" => (int)$varient->price,
                    "mainimage" => $mainimage,
                    'product_id' => $varient->product_id
                ]
            ];
            session()->put('cart', $cart);
            return response()->json(['data'=>'done']);
        }
        if(array_key_exists($varient->id,$cart)) {
            $cart[$varient->id]['quantity']+=1;
            session()->put('cart', $cart);
            return response()->json(['data'=>'done2']);
        }


        $cart[$varient->id] = [
            "id" => $varient->id,
            "name" => $varient->product->name,
            "quantity" => 1,
            "price" => (int)$varient->price,
            "mainimage" => $mainimage,
            'product_id' => $varient->product_id
        ];
        session()->put('cart', $cart);
        return response()->json(['data'=>'done3']);

    }

    public function delete ($id) {
        if (session()->has('cart')) {
            $cart = session()->get('cart');
            if(array_key_exists($id,$cart)) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
        }
    }

}









?>
