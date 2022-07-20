<?php

namespace Modules\Product\Entities\Category;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Product\Entities\Product\Product;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'description' , 'meta_title' , 'meta_keywords' ,'status' , 'image' , 'parent_id'];

    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\CategoryFactory::new();
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
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

    public function scopeSearch($query , $value)
    {
        return $query->when($value , function() use($value , $query){
            $query->where('name','LIKE','%'.$value.'%')
            ->orWhere('description' , 'LIKE' , '%'.$value.'%');
        });
    }



    public  function getParents () {
        $parent = $this->parent;
        $parents = collect([]);
        while(!is_null($parent)) {
            $parents->push($parent);
            $parent = $parent->parent;
        }

        return $parents ;

    }

    public function treeCount(){

        if(is_null( $this->getParents()->count()))
        return 0;
        return $this->getParents()->count();
    }

    public function getParentsCountAttribute(){
        return $this->getParents()->count();
    }


}
