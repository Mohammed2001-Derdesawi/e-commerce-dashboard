<?php

namespace Modules\Product\Filters\Like;

use App\Filters\Filter;

class Search extends Filter {
    public function filter ($builder) {
        return $builder->orWhereHas(

            'user',function ($query){
                $query->where('name','LIKE' , '%'.request($this->filtername()).'%');

        });
    }
}


?>
