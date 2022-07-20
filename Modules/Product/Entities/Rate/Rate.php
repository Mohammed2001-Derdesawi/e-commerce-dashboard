<?php

namespace Modules\Product\Entities\Rate;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rate extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','rate','rateable_id','rateable_type'];

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

    public function rateable(){
        return $this->morphTo();
    }
}
