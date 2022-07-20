<?php

namespace Modules\Product\Entities\WishList;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WishList extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\WishList\WishListFactory::new();
    }
}
