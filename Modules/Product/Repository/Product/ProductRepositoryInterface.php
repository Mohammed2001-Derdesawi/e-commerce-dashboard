<?php

namespace Modules\Product\Repository\Product;

interface ProductRepositoryInterface {

    public function index($columns=['*'] , $paginate , $relations=['*']);

    public function store($data);
    public function getByID($id,$columns=['*'],$relations=[''],$countrates=false);
    public function getimagesInfo($images);
    public function update($request);
    public function delete($id);
    public function view($id);
   



}
