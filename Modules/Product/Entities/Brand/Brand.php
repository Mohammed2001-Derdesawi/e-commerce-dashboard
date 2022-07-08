<?php

namespace Modules\Product\Entities\Brand;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Product\Entities\Product\Product;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'image'];

    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\BrandFactory::new();
    }

    /**
     * Get all of the products for the Brand
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'brand_id', 'id');
    }
}
