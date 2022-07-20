<?php

namespace Modules\Product\Entities\View;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class View extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','viewable_id','viewable_type'];
    
    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\View\ViewFactory::new();
    }

    public function viewable()
    {
       return $this->morphTo();
    }
}
