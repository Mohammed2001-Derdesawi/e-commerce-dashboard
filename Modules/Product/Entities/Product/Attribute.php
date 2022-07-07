<?php

namespace Modules\Product\Entities\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ['name','type'];
    protected $casts = [
        'created_at' => 'datetime:m-d-Y',
    ];


    // public function getCreatedAtAttribute()
    // {
    //     return  Carbon::parse($this->attributes['created_at'])->format('Y-M-d');
    // }

    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\Product\AttributeFactory::new();
    }


    // /**
    //  * The options that belong to the Attribute
    //  *
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    //  */
    // public function options(): BelongsToMany
    // {
    //     return $this->belongsToMany(Role::class, 'role_user_table', 'user_id', 'role_id');
    // }
}
