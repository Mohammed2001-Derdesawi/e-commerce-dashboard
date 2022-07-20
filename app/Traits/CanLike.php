<?php

namespace App\Traits;

use Modules\Product\Entities\Product\Product;

trait CanLike
{



    public function like($product_id,$likevalue)
    {

        $model=findById($product_id,new Product(),[]);
        $like=$this->likes->where('likeable_id',$model->id)->where('likeable_type',get_class($model))->first();
       if(!$like)
       $like= $this->likes()->create([
            'like'=>$likevalue,
            'likeable_id'=>$model->id,
            'likeable_type'=>get_class($model),

        ]);
        else
        $like->update(['like'=>$likevalue]);
         return $like;

    }
    public function unlike($id)
    {
       $this->likes()->findOrFail($id)->delete();

    }


}
