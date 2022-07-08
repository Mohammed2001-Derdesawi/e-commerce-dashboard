<?php

namespace Modules\Product\Repository\Product;

use Modules\Product\Entities\Product\Product;

class ProductRepository implements ProductRepositoryInterface {

    public function index($columns = ['*'], $paginate, $relations=['*'])
    {
        return Product::with($relations)->select($columns)->get();
    }
    public function store($data){
        dd($data);
    }

}
