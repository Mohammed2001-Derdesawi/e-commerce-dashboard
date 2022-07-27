<?php

namespace Modules\User\Entities\Address;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Order\Entities\Order\Order;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'street1',
        'city',
        'state',
        'zip',
        'country',
        'phone'
    ];

    protected static function newFactory()
    {
        return \Modules\User\Database\factories\Address\AddressFactory::new();
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function orders(){
        return $this->belongsToMany(Order::class,'address_order','address_id','order_id','id','id');
    }
}
