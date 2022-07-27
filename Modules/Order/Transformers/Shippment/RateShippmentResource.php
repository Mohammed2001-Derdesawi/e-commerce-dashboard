<?php

namespace Modules\Order\Transformers\Shippment;

use Illuminate\Http\Resources\Json\JsonResource;

class RateShippmentResource extends JsonResource
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
            'amount'=>$this->amount,
            'attributes'=>$this->attributes,
            'currency'=>$this->currency,
            'days'=>$this->estimated_days,
            'messgae'=>$this->duration_terms,
            'shippment'=>$this->shipment,
            'rate_id'=>$this->object_id


        ];
    }
}
