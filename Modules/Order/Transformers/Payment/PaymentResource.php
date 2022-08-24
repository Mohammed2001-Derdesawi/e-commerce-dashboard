<?php

namespace Modules\Order\Transformers\Payment;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'key'=>$this->when($this->key!='undefined',$this->key,''),
            'icon'=>$this->icon,
            'status'=>$this->status,
            'secret'=>$this->when($this->secret!='undefined',$this->secret,''),
            'username'=>$this->when($this->username!='undefined',$this->username,''),
            'password'=>$this->when($this->password!='undefined',$this->password,''),
            'certificate'=>$this->when($this->certificate!='undefined',$this->certificate,''),
            'currency'=>$this->when($this->currency!='undefined',$this->currency,''),
        ];
    }
}
