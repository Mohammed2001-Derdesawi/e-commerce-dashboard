<?php




namespace Modules\Product\Repository\Rate;


interface RateInterface {
    public function index($columns=['*'],$relations=[''],$paginate=25);
    public function getRateById($id);
    public function update($id,$rate);
    public function delete($id);
    public function store($product,$rate);




}
