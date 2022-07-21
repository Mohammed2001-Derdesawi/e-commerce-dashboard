<?php

namespace Modules\Product\Entities\Product;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use Modules\Product\Entities\Gallery\Gallery;
use Modules\Product\Entities\Varient\Varient;
=======
use Modules\Product\Entities\Rate\Rate;
use Modules\Product\Entities\Brand\Brand;
use Modules\Product\Entities\Comment\Comment;
use Modules\Product\Entities\Gallery\Gallery;
use Modules\Product\Entities\Varient\Varient;
use Modules\Product\Entities\Category\Category;
use Illuminate\Database\Eloquent\Relations\HasOne;
>>>>>>> refs/remotes/origin/main
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Brand\Brand;
use Modules\Product\Entities\Category\Category;

class Product extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $fillable = ['name' , 'description' , 'status' , 'width' , 'height' , 'length' , 'weight' , 'meta_name' , 'meta_description' , 'meta_keywords' , 'tax' , 'brand_id' , 'category_id'];
=======
    protected $fillable = ['name' , 'description' , 'status' , 'width' , 'height' , 'length' , 'weight' , 'meta_name' , 'meta_description' , 'meta_keywords' , 'is_tax' , 'brand_id' , 'category_id','tax'];
>>>>>>> refs/remotes/origin/main

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
<<<<<<< HEAD
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function images(): hasMany
=======
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function images(): HasMany
>>>>>>> refs/remotes/origin/main
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
<<<<<<< HEAD
=======

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

>>>>>>> refs/remotes/origin/main
}
