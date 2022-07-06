<?php

namespace Modules\Product\Repository\Product;


class ProductRepository implements ProductRepositoryInterface {

    public function Products($columns = ['*'], $paginate, $relations=['*'])
    {
        return Product::select($columns)->with($relations)->get();
    }
}
