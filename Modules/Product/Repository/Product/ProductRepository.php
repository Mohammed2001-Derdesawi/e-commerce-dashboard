<?php

namespace Modules\Product\Repository\Product;

use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Storage;
use Modules\Product\Filters\Product\Search;
use Modules\Product\Entities\Product\Product;

class ProductRepository implements ProductRepositoryInterface {

    public function index($columns = ['*'], $paginate, $relations=['*'])
    {
        return app(Pipeline::class)
        ->send(Product::query())
        ->through([
            Search::class,

        ])
        ->thenReturn()
        ->with($relations)
        ->select($columns)
        ->withCount('varients')
        ->withSum('varients as quantity_count','quantity')
        ->withAvg('rates as rate','rate')
        ->paginate($paginate);

    }
    public function getByID($id,$columns=['*'],$relations=[''],$countrates=false)
     {
        if($countrates)
        return Product::with($relations)->select($columns)->withCount('rates as rates')->withAvg('rates as stars','rate')->findOrFail($id);

        return Product::with($relations)->select($columns)->findOrFail($id);

     }
    public function store($data){
        dd($data);
    }
    public function getimagesInfo($request)
    {
        $images=[];
        $files=json_decode($request->images,true);
        foreach ($files as $file)
        {

            array_push($images,['name'=>substr($file['path'],strrpos($file['path'],'/')+1) ,
            'size'=>Storage::disk('public')->size($file['path']) ,
            'lastModified'=> Storage::disk('public')->lastModified($file['path']),
            'is_main'=>(int)$file['is_main'],
            'path'=>$file['path'],
            'id'=>$file['id']


        ]);

        }
        return $images;

    }

    public function update($request){
          dd($request);
    }

    public function delete($id)
    {
        $this->getByID($id)->delete();
        return ;

    }


}
