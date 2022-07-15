<?php

namespace Modules\Order\Transformers\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
             'status'=>$this->status,
             'total'=>$this->ordersdetails->sum('total'),
             'created_at'=>$this->created_at,
             'updated_at'=>$this->updated_at,

        ];
    }
}
