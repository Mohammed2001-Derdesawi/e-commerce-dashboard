<?php

namespace Modules\Product\Repository\Product;

interface ProductRepositoryInterface {
    public function Products($columns=['*'] , $paginate , $relations=['*']);
}
