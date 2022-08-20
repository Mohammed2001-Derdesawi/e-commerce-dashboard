<?php

namespace Modules\Order\Entities\Shipment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = ['key','status'];

    // protected static function newFactory()
    // {
    //     return \Modules\Order\Database\factories\Shipment\ShipmentFactory::new();
    // }

    public function status()
    {
        
        $this->status=!$this->status?0:1;
    }
}
