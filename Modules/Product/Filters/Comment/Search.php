<?php

namespace Modules\Product\Filters\Comment;

use App\Filters\Filter;

class Search extends Filter {
    public function filter ($builder) {
        return $builder->where('body' , 'LIKE' , '%'.request($this->filtername()).'%')->orWhereHas(

            'user',function ($query){
                $query->where('name','LIKE' , '%'.request($this->filtername()).'%');

        });
    }
}


?>
