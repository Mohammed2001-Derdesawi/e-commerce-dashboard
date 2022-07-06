<?php

namespace Modules\Product\Entities\Brand;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'image'];
    
    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\BrandFactory::new();
    }
}
