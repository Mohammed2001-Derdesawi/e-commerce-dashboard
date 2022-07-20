<?php

namespace Modules\Product\Filters\Brand;

use App\Filters\Filter;

class Search extends Filter {

    public function filter ($builder) {
        return $builder->where('name' , 'LIKE' , '%'.request($this->filtername()).'%');
    }
}


?>
