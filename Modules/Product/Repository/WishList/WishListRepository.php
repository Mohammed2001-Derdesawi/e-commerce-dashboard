<?php

namespace Modules\Product\Repository\WishList;

use Modules\Product\Entities\Gallery\Gallery;
use Modules\Product\Repository\WishList\WishListRepositoryInterface;

class WishListRepository implements WishListRepositoryInterface {

    public function store($data)
    {

        $varient = $data;
        $mainimage = Gallery::where('product_id' , $varient->product_id)->where('is_main' , 1)->first()->path;
        $wishList = session()->get('wishList');


        if(!$wishList) {
            $wishList = [
                $varient->id => [
                    "id" => $varient->id,
                    "name" => $varient->product->name,
                    "quantity" => 1,
                    "price" => (int)$varient->price,
                    "mainimage" => $mainimage,
                    'product_id' => $varient->product_id
                ]
            ];
            session()->put('wishList', $wishList);
            return response()->json(['data'=>'done']);
        }
        if(array_key_exists($varient->id,$wishList)) {
            $wishList[$varient->id]['quantity']+=1;
            session()->put('wishList', $wishList);
            return response()->json(['data'=>'done2']);
        }


        $wishList[$varient->id] = [
            "id" => $varient->id,
            "name" => $varient->product->name,
            "quantity" => 1,
            "price" => (int)$varient->price,
            "mainimage" => $mainimage,
            'product_id' => $varient->product_id
        ];
        session()->put('wishList', $wishList);
        return response()->json(['data'=>'done3']);
    }

    public function delete($id)
    {
        if (session()->has('wishList')) {
            $wishList = session()->get('wishList');
            if(array_key_exists($id,$wishList)) {
                unset($wishList[$id]);
                session()->put('wishList', $wishList);
            }
        }
    }
}
?>
