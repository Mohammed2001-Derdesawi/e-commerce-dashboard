<?php

namespace Modules\Order\Entities\Payment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['key','username','password','secret','certificate','currency','status'];


    public function status()
    {
        $this->status=!$this->status?0:1;

    }
}
