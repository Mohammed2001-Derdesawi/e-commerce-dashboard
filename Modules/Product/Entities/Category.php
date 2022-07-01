<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'description' , 'meta_title' , 'meta_keywords' ,'status' , 'image' , 'parent_id'];
    
    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\CategoryFactory::new();
    }


    public function parent() // category
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }


    public function children() // sub-categories
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function setMetaKeywordsAttribute($val){
        $this->attributes['meta_keywords'] = implode("," ,array_column(json_decode($val) , "value"));
    }

    // public function scopeRoot($query)
    // {
    //     return $query->whereNull('parent_id');
    // }
}
