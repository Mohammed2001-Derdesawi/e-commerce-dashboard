<?php

namespace Modules\Order\Entities\Order;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Modules\Order\Entities\Order\OrderDetails;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Order\Database\factories\Order\OrderFactory;
use Modules\User\Entities\Address\Address;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['status','user_id','delivery_date','total','shipment_id','payment_id','invoice_number','shipment_number'];

    /**
     * Get all of the orderdetails for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ordersdetails(): HasMany
    {
        return $this->hasMany(OrderDetails::class, 'order_id', 'id');
    }

    public function addresses(){
        return $this->belongsToMany(Address::class,'address_order','order_id','address_id','id','id');
    }


    /**
     * Get the user that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopeStatus($query,$search)
    {
        return $query->with('user:name')->orwhere('users.name',$search)->orwhere('id',$search);
    }
    public function getStatusAttribute()
    {
        return Str::ucfirst($this->attributes['status']);
    }



    protected static function newFactory()
    {
        return \Modules\Order\Database\factories\Order\OrderFactory::new();
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->format('Y-m-d');
    }
    public function getUpdatedAtAttribute()
    {
        return Carbon::parse($this->attributes['updated_at'])->format('Y-m-d');
    }

}
