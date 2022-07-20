<?php

namespace Modules\Product\Entities\Product;

use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Gallery\Gallery;
use Modules\Product\Entities\Varient\Varient;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Brand\Brand;
use Modules\Product\Entities\Category\Category;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'description' , 'status' , 'width' , 'height' , 'length' , 'weight' , 'meta_name' , 'meta_description' , 'meta_keywords' , 'tax' , 'brand_id' , 'category_id'];

    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\Product\ProductFactory::new();
    }

    /**
     * Get all of the comments for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function varients(): HasMany
    {
        return $this->hasMany(Varient::class, 'product_id', 'id');
    }

    /**
     * The roles that belong to the Attribute
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function images(): hasMany
    {
        return $this->hasMany(Gallery::class, 'product_id', 'id');
    }


    /**
     * Get the brand that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }


    /**
     * Get the category that owns the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
