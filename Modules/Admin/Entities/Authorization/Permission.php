<?php

namespace Modules\Admin\Entities\Authorization;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as ModelsPermission;

class Permission extends ModelsPermission
{
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\Authorazation\PermissionFactory::new();
    }


}
