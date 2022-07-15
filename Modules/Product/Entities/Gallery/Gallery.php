<?php

namespace Modules\Product\Entities\Gallery;

use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Product\Product;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gallery extends Model
{
    use HasFactory;
    protected $table="galleries";

    protected $fillable = ['path' , 'is_main' , 'product_id'];

    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\Gallery\GalleryFactory::new();
    }
    /**
     * Get the product that owns the Gallery
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }


}
