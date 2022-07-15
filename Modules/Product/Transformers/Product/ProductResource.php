<?php

namespace Modules\Product\Transformers\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'name'=>$this->name,
            'category'=>$this->category->name,
            'brand'=>$this->brand->name,
            'varients'=>$this->varients_count,
            'quantity'=>$this->quantity_count,
            'quantity_varients'=>$this->when($this->varients_count==1,$this->varients->first()->quantity,null),
            'main_image'=>$this->mainimage->path,
            'rate'=>(int)$this->rate

        ];
    }
}
