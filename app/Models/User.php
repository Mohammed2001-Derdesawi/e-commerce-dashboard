<?php

namespace App\Models;

use App\Traits\CanLike;
use App\Traits\CanComment;
use App\Traits\CanRate;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Modules\Order\Entities\Order\Order;
use Modules\Product\Entities\Comment\Comment;
use Modules\Product\Entities\Like\Like;
use Modules\Product\Entities\Rate\Rate;
use Modules\Product\Entities\View\View;




class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, CanRate, CanComment,CanLike;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
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

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }


    public function setEmailAttribute($value)
    {
        $after_char = substr($value, strpos($value,'@')+strlen('@'));
        $before_char = substr($value , 0 , strpos($value , '@'));

        $email_filter = str_replace('.' , '' , $before_char);
        $email = $email_filter.'@'.$after_char;

        $this->attributes['email'] = $email;

    }
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
    public function rates()
    {
        return $this->hasMany(Rate::class, 'user_id', 'id');
    }

    public function comments()
    {
        $this->hasMany(Comment::class, 'user_id', 'id');
    }
}
