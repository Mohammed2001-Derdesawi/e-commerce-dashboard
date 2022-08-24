<?php

namespace Modules\Order\Entities\Order;

use Modules\Order\Entities\Order;
use Illuminate\Database\Eloquent\Model;
use Modules\Order\Entities\Order\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Varient\Varient;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table='orders_details';

    protected $fillable = ['order_id','varient_id','price','quantity'];
    Protected $appends=['total'];


    /**
     * Get the order that owns the OrderDetails
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    public function product()
    {
        return $this->belongsTo(Varient::class,'varient_id','id');
    }

    public function getTotalAttribute()
    {

        return $this->quantity * $this->price;

    }



    protected static function newFactory()
    {
        return \Modules\Order\Database\factories\Order\OrderDetailsFactory::new();
    }
}
