<?php

namespace Modules\Product\Entities\Gallery;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['path' , 'is_main' , 'product_id'];

    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\Gallery\GalleryFactory::new();
    }
}
