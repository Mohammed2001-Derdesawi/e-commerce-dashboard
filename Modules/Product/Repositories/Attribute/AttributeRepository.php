<?php


namespace Modules\Product\Repositories\Attribute;

use Illuminate\Pipeline\Pipeline;
use Modules\Product\Filters\Attribute\Search as AttributeSearch;
use Modules\Product\Entities\Product\Attribute as ProductAttribute;

class AttributeRepository implements AttributeInterface {


    public function get($params=['*'],$relations=[''],$paginate){
        $attributes= app(Pipeline::class)
        ->send(ProductAttribute::query())
        ->through([
            AttributeSearch::class,
        ])
        ->thenReturn()
        ->with($relations)
        ->select($params);
        if($paginate)
        return $attributes->paginate($paginate);

        return $attributes->get();



    }

     public function store($data)
     {
        $attribute=ProductAttribute::create([
            'name'=>$data->name,
            'type'=>$data->type,
        ]);
        return $attribute;

     }
     public function find($id,$relations=[],$params=['*'])
     {
         return ProductAttribute::with($relations)->select($params)->findOrFail($id);
     }
     public function  update($id, $data,$relations=[],$params=['*'])
     {
         $attribute=$this->find($id,$relations,$params);
         $attribute->update([
            'name'=>$data->name,
            'type'=>$data->type,


         ]);
         return $attribute;

     }
     public function delete($id)
     {
          $this->find($id)->delete();

     }
}
