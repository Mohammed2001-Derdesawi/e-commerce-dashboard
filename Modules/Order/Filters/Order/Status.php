<?php
namespace Modules\Order\Filters\Order;

use App\Filters\Filter;

class Status extends Filter {
   public function filter($builder)
    {
        // return $filter!=-1?$query->where('status',$filter)->orderBy('created_at','desc')->paginate(15):$query->orderBy('created_at','desc');

          return $builder->where('status',request($this->filtername()))->orderBy('created_at','desc');
    }

}
