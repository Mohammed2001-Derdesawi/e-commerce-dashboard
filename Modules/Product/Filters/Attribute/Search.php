<?php

namespace Modules\Product\Filters\Attribute;

use App\Filters\Filter;

class Search extends Filter{
    public function filter($builder)
    {

         return $builder->where('name','LIKE','%'.request($this->filtername()).'%')->orWhere('id','LIKE','%'.request($this->filtername()).'%');
    }
}
