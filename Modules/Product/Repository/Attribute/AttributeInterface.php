<?php


namespace Modules\Product\Repository\Attribute;

interface AttributeInterface{
    public function store($data);
    public function find($id,$relations=[],$params=['*']);
    public function update($id,$data,$relations=[],$params=['*']);
    public function delete($id);
    public function get($params=['*'],$relations=[''],$paginate);


}
