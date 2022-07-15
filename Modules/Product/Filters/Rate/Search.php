<?php

namespace Modules\Product\Filters\Rate;

use App\Filters\Filter;

class Search extends Filter {
    public function filter ($builder) {
        return $builder->orwhere('rate' , 'LIKE' , '%'.request($this->filtername()).'%')
        ->orWhereHas(

            'user',function ($query){
                $query->Where('name','LIKE' , '%'.request($this->filtername()).'%');

        });
    }
}


?>
