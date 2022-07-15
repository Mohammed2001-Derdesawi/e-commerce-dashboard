<?php

namespace Modules\Product\Transformers\Attribute;

use Attribute;
use Illuminate\Http\Resources\Json\JsonResource;

class AttributeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */

    public function toArray($request)
    {

        return
        [
            'id'=>$this->id,
            'name'=>$this->name,
            'type'=>$this->when($this->type,$this->type),
            'created_at'=>$this->when(!is_null($this->created_at),$this->created_at?$this->created_at->format('Y-m-d'):''),
        ];
    }
}
