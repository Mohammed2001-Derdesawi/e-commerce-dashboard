<?php

namespace Modules\Product\Repository\Product;

interface ProductRepositoryInterface {

    public function index($columns=['*'] , $paginate , $relations=['*']);

    public function store($data);
}
