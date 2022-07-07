<?php
namespace Modules\Admin\Filters\Admin;

use App\Filters\Filter;

class Search extends Filter {
   public function filter($builder)
    {
        return $builder->where('email','Like','%'.request($this->filtername()).'%')->orWhere('username','Like','%'.request($this->filtername()).'%');

    }
}


