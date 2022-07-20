<?php

namespace Modules\Product\Entities\Like;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Like extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','like','likeable_id','likeable_type'];

    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\Rate\RateFactory::new();
    }

    /**
     * Get the user that owns the Rate
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function likeable(){
        return $this->morphTo();
    }
}
