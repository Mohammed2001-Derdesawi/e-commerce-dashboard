<?php

namespace Modules\Product\Entities\Product;

use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Rate\Rate;
use Modules\Product\Entities\Brand\Brand;
use Modules\Product\Entities\Comment\Comment;
use Modules\Product\Entities\Gallery\Gallery;
use Modules\Product\Entities\Varient\Varient;
use Modules\Product\Entities\Category\Category;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Like\Like;
use Modules\Product\Entities\View\View;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'description' , 'status' , 'width' , 'height' , 'length' , 'weight' , 'meta_name' , 'meta_description' , 'meta_keywords' , 'is_tax' , 'brand_id' , 'category_id','tax','real_views','views'];

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function images(): HasMany
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

    /**
     * Get the mainimage associated with the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function mainimage(): HasOne
    {
        return $this->hasOne(Gallery::class, 'product_id', 'id')->where('is_main',1);
    }

    public function rates()
    {
        return $this->morphMany(Rate::class,'rateable');
    }
    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }
    public function likeable()
    {
        return $this->morphMany(Like::class,'likeable');
    }

    public function real_views()
    {
        return $this->morphMany(View::class,'viewable');
    }

}
