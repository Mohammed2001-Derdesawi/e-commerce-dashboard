<?php

namespace Modules\Admin\Entities\Authorization;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as ModelsRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends ModelsRole
{
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\Authorazation\RoleFactory::new();
    }
    public function getCreatedAtAttribute()
    {
       return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }
    public function scopeRole($query,$search)
    {
        return $query->where('name','LIKE','%'.$search.'%')->select('name','id','created_at');
    }

}
