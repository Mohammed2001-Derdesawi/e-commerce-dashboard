<?php

namespace Modules\Order\Entities\Order;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{


    // This Class Just For Testing Relations -_-
    use HasFactory;

    protected $fillable = ['price','quantity','name','description','sku'];

    protected static function newFactory()
    {
        return \Modules\Order\Database\factories\Order\ProductFactory::new();
    }
}
