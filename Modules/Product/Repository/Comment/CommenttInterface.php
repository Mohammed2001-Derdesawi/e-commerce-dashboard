<?php




namespace Modules\Product\Repository\Comment;


interface CommenttInterface {
    public function index($columns=['*'],$relations=[''],$paginate=25);
    public function getCommenttById($id);
    public function update($id,$body);
    public function delete($id);
    public function store($product,$body);




}
