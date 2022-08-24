<?php

namespace Modules\Product\Filters\Like;

use App\Filters\Filter;

class Like extends Filter {
    public function filter ($builder) {
        return $builder->where('like',request($this->filtername()));
    }
}


?>
