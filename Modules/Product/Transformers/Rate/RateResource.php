<?php

namespace Modules\Product\Transformers\Rate;

use Illuminate\Http\Resources\Json\JsonResource;

class RateResource extends JsonResource
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
            'rate'=>(int)$this->rate,
            'product'=>$this->rateable
        ];
    }
}
