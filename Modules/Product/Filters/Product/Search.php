<?php

namespace Modules\Product\Filters\Product;

use App\Filters\Filter;

class Search extends Filter{
    public function filter($builder)
    {
        return $builder->where('name','LIKE','%'.request($this->filtername()).'%')->orwhere('id','LIKE','%'.request($this->filtername()).'%');
    }

}









?>
