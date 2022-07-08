<?php

namespace Modules\Product\Entities\Attribute;

use Illuminate\Database\Eloquent\Model;
use Modules\Product\Entities\Varient\Varient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ['name','type'];
    protected $casts = [
        'created_at' => 'datetime:m-d-Y',
    ];


    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\Product\AttributeFactory::new();
    }


    /**
     * The roles that belong to the Attribute
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function varients(): BelongsToMany
    {
        return $this->belongsToMany(Varient::class, 'attribute_varient', 'attribute_id', 'varient_id');
    }

}
