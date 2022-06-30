<?php

namespace Modules\Admin\Entities\Admin;

use Carbon\Carbon;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use PhpParser\Node\Expr\FuncCall;

class Admin extends Authenticatable
{
    use HasFactory,HasRoles;
    public $guard='admin';
    public $gaurd_name='admin';

    protected $fillable = ['username','email','password','avatar','last_login_at'];
     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    // protected $casts = [
    //     'last_login_at' => 'datetime',
    // ];

    protected static function newFactory()
    {
        return \Modules\Admin\Database\factories\Admin\AdminFactory::new();
    }

    public function getLastLoginAtAttribute()
    {
       return Carbon::parse($this->attributes['last_login_at'])->diffForHumans();
    }
    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('Y-m-d');
    }
    public function scopeSearch($query,$search)
    {
        return $query->where('email','Like','%'.$search.'%')->orWhere('username','Like','%'.$search.'%')->paginate(15);
    }
    public function scopeAdmin($query,$filter)
    {

        return $filter!=-1?$query->where('status',$filter)->orderBy('created_at','desc')->paginate(15):$query->orderBy('created_at','desc')->paginate(15);

    }
    public function scopeFilter($query,$search)
    {
        return $query->where('email','Like','%'.$search.'%')->orWhere('username','Like','%'.$search.'%');
    }


}
