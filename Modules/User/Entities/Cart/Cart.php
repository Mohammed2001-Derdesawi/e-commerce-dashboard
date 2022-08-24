<?php

namespace Modules\User\Entities\Cart;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Varient\Varient;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    protected static function newFactory()
    {
        return \Modules\User\Database\factories\Cart\CartFactory::new();
    }


    public function user () {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }

    public function varients () {
        return $this->belongsToMany(Varient::class , 'cart_varient' , 'cart_id' , 'varient_id')->withPivot('qty');
    }
}
