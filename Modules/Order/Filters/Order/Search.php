<?php
namespace Modules\Order\Filters\Order;

use App\Filters\Filter;

class Search extends Filter {
   public function filter($builder)
    {
        return $builder->whereHas(
            [
            'user'=>function ($query){
                $query->where('name','LIKE','%'.request($this->filtername()."%"));



            }
            ]

        )
        ->orwhere('id',request($this->filtername()));

    }
}


