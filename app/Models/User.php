<?php

namespace App\Models;

use App\Traits\CanLike;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Order\Entities\Order\Order;
use Modules\Product\Entities\Like\Like;
use Modules\Product\Entities\View\View;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,CanLike;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * Get all of the orders for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function views()
    {
       return $this->hasMany(View::class,'user_id','id');
    }
    public function likes()
    {
        return $this->hasMany(Like::class,'user_id','id');
    }

    public function hasSeethisProduct($product)
    {
        return $this->views()->where('viewable_id',$product->id)->where('viewable_type',get_class($product))->first()?true: false;

    }
}
