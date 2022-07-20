<?php

namespace App\Models;

<<<<<<< HEAD
use App\Traits\CanLike;
=======
use App\Traits\CanComment;
use App\Traits\CanRate;
>>>>>>> 10bdf55e56e5d580f8b241021bdf87d286193de8
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Order\Entities\Order\Order;
<<<<<<< HEAD
use Modules\Product\Entities\Like\Like;
use Modules\Product\Entities\View\View;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,CanLike;
=======
use Modules\Product\Entities\Comment\Comment;
use Modules\Product\Entities\Rate\Rate;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, CanRate, CanComment;
>>>>>>> 10bdf55e56e5d580f8b241021bdf87d286193de8

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

<<<<<<< HEAD
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

=======
    public function rates()
    {
        return $this->hasMany(Rate::class, 'user_id', 'id');
    }

    public function comments()
    {
        $this->hasMany(Comment::class, 'user_id', 'id');
>>>>>>> 10bdf55e56e5d580f8b241021bdf87d286193de8
    }
}
