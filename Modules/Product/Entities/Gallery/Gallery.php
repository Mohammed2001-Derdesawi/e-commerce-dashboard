<?php

namespace Modules\Product\Entities\Gallery;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Product\Product;
=======
use Modules\Product\Entities\Product\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
>>>>>>> refs/remotes/origin/main

class Gallery extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======
    protected $table="galleries";
>>>>>>> refs/remotes/origin/main

    protected $fillable = ['path' , 'is_main' , 'product_id'];

    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\Gallery\GalleryFactory::new();
    }
<<<<<<< HEAD

    public function product (){
        return $this->belongsTo(Product::class , 'product_id' , 'id');
    }
=======
    /**
     * Get the product that owns the Gallery
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }


>>>>>>> refs/remotes/origin/main
}
