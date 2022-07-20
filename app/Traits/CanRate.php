<?php

namespace App\Traits;

use Modules\Product\Entities\Product\Product;

trait CanRate
{



    public function rate($product_id,$ratevalue)
    {

        $model=findById($product_id,new Product(),[]);
        $rate=$this->rates->where('rateable_id',$model->id)->where('rateable_type',get_class($model))->first();
       if(!$rate)
       $rate= $this->rates()->create([
            'rate'=>$ratevalue,
            'rateable_id'=>$model->id,
            'rateable_type'=>get_class($model),

        ]);
        else
        $rate->update(['rate'=>$ratevalue]);
         return $rate;

    }
    public function unrate($id)
    {
       $this->rates()->findOrFail($id)->delete();

    }


}
