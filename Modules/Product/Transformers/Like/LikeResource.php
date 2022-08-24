<?php

namespace Modules\Product\Transformers\Like;

use Illuminate\Http\Resources\Json\JsonResource;

class LikeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            
          
            'id'=>$this->id,
            'user'=>$this->user,
            'like'=>(int)$this->like,
            'product'=>$this->likeable
        ];
    }
}
