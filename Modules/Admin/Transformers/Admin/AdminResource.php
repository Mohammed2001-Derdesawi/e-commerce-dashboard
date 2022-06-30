<?php

namespace Modules\Admin\Transformers\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'username'=>$this->username,
            'email'=>$this->email,
            'avatar'=>$this->avatar,
            'last_login_at'=>$this->last_login_at,
            'created_at'=>$this->created_at,
            'status'=>$this->status,
            'roles'=>$this->getRoleNames()

        ];
    }
}
