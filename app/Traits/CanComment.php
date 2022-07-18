<?php

namespace App\Traits;

use Modules\Product\Entities\Product\Product;

trait CanComment
{



    public function comment($product_id,$body)
    {

        $model=findById($product_id,new Product(),[]);
        $comment=$this->rates->where('commentable_id',$model->id)->where('commentable_type',get_class($model))->first();
       if(!$comment)
       $comment= $this->comments()->create([
            'body'=>$body,
            'commentable_id'=>$model->id,
            'commentable_type'=>get_class($model),

        ]);
        else
        $comment->update(['body'=>$body]);
         return $comment;

    }
    public function uncomment($id)
    {
       $this->comments()->findOrFail($id)->delete();

    }


}
