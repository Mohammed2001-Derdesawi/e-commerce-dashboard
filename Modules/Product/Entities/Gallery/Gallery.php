<?php

namespace Modules\Product\Entities\Gallery;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Product\Product;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['path' , 'is_main' , 'product_id'];

    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\Gallery\GalleryFactory::new();
    }

    public function product (){
        return $this->belongsTo(Product::class , 'product_id' , 'id');
    }
}
