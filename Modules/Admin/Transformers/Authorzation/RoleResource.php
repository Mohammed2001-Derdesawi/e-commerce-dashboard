<?php

namespace Modules\Admin\Transformers\Authorzation;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Admin\Entities\Admin\Admin;

class RoleResource extends JsonResource
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
           'admin_count'=>Admin::role($this->name)->count(),
           'permissions'=>$this->permissions,
           'created_at'=>$this->created_at,
           'admins'=>Admin::role($this->name)->get(),
        ];
    }
}
