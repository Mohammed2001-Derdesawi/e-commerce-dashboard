<?php

namespace Modules\Admin\Transformers\Authorzation;

use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        dd($this);
        return [
            'name'=>$this->name,

        ];
    }
}
