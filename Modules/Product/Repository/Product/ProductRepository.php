<?php

namespace Modules\Product\Repository\Product;

<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Modules\Product\Entities\Attribute\Attribute;
use Modules\Product\Entities\Gallery\Gallery;
use Modules\Product\Entities\Product\Product;
use Modules\Product\Entities\Varient\Varient;

class ProductRepository implements ProductRepositoryInterface {

    protected $path = 'Gallery/Product/';

    public function index($columns = ['*'], $paginate, $relations=['*'])
    {
        return Product::with($relations)->select($columns)->get();
    }

    public function store($data){

        $request = json_decode($data->product,true);
//        dd($request);
//   dd(12);
        $product = Product::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'status' => $request['status'],
            'width' => $request['dimension']['width'],
            'length' => $request['dimension']['length'],
            'height' => $request['dimension']['height'],
            'weight' => $request['weight'],
            'meta_name' => $request['meta']['name'],
            'meta_description' => $request['meta']['description'],
            'meta_keywords' => $request['meta']['keywords'],
//            'is_tax' => $request['has_tax'],
            'tax' => (int)$request['tax'],
            'category_id' => $request['category'],
//          'brand_id' => $request['brand_id'],
        ]);

        if($data->hasFile('file')) {
            $image = $this->path . storeImage($this->path , $data->file);
            $gallery = Gallery::create([
                'path' => $image,
                'is_main' => 1,
                'product_id' => $product->id
            ]);
        }

        if($data->hasFile('images')) {
            $images = [];
            for ($i = 0 ; $i<count($data->images) ; $i++) {
                $image = $this->path . storeImage($this->path , $data->images[$i]);
                $images[] = new Gallery([
                    'path' => $image,
                    'is_main' => 0 ,
                    'product_id' => $product->id
                ]);
            }
            $product->images()->saveMany($images);
        }


        if (count($request['varients']) != 0) {
            $varients = [];
            for ($i = 0 ; $i<count($request['varients']) ; $i++) {
                $varients[] = Varient::create([
                    'quantity' => $request['varients'][$i]['quantity'],
                    'price' => $request['varients'][$i]['price'],
                    'sku' => $request['varients'][$i]['sku'],
                    'product_id' => $product->id,
                ]);

                $arttributes_varients = [];
                for ($j = 0 ; $j<count($request['varients'][$i]['attributes']) ; $j++) {
                    $attribute_id = findById($request['varients'][$i]['attributes'][$j] , new Attribute())->id;
                    $value = $request['varients'][$i]['values'][$j];
                    $arttributes_varients[] = ['attribute_id'=>$attribute_id , 'value'=>$value];
                }
                $varients[$i]->attributes()->attach($arttributes_varients);
            }
        } else {
            $varient = Varient::create([
                'quantity' => $request['quantity'],
                'price' => $request['price'],
                'sku' => $request['sku'],
                'product_id' => $product->id,
            ]);
        }

    }





    public function update($request){

        $data = json_decode($request->product , true);
        $product = findById($data['id'] , new Product);

        $product->update([
            'name' => $data['name'],
            'description' => $data['description'],
            'status' => $data['status'],
            'width' => $data['width'],
            'length' => $data['length'],
            'height' => $data['height'],
            'weight' => $data['weight'],
            'meta_name' => $data['meta_name'],
            'meta_description' => $data['meta_description'],
            'meta_keywords' => $data['meta_keywords'],
            'tax' => (int)$data['tax'],
            'category_id' => $data['category_id'],
//          'brand_id' => $data['brand_id'],
        ]);

        $oldMainImage = Gallery::where('product_id' , $product->id)->where('is_main' , 1)->first();
        if($request->hasFile('file')) {
            $image = $this->path . editImage($this->path , $request->file , $oldMainImage->path);
            $oldMainImage->update([
                'path' => $image,
                'is_main' => 1,
                'product_id' => $product->id
            ]);
        }


        $images = Gallery::where('product_id' , $product->id)->where('is_main' , 0)->get();

        if($request->oldimages == null) {
            $images->delete();
        } else {
            foreach ($images as $image) {
                if(!in_array($image->id , $request->oldimages)) {
                    deleteImage($image->path);
                    $image->delete();
                }
            }
        }

        if($request->file('images') != null) {
            $images = [];
            foreach ($request->file('images') as $image) {
                $image = $this->path . storeImage($this->path , $image);
                $images[] = new Gallery([
                    'path' => $image,
                    'is_main' => 0 ,
                    'product_id' => $product->id
                ]);
            }
            $product->images()->saveMany($images);
        }

        $varient = Varient::where('product_id' , $product->id)->delete();
        if (count($data['varients']) != 0) {
            $varients = [];
            for ($i = 0 ; $i<count($data['varients']) ; $i++) {
                $varients[] = Varient::create([
                    'quantity' => $data['varients'][$i]['quantity'],
                    'price' => $data['varients'][$i]['price'],
                    'sku' => $data['varients'][$i]['sku'],
                    'product_id' => $product->id,
                ]);



                $arttributes_varients = [];
                for ($j = 0 ; $j<count($data['varients'][$i]['attributes']) ; $j++) {
                    $attribute_id = findById($data['varients'][$i]['attributes'][$j] , new Attribute())->id;
                    $value = $data['varients'][$i]['values'][$j];
                    $arttributes_varients[] = ['attribute_id'=>$attribute_id , 'value'=>$value];
                }
                $varients[$i]->attributes()->attach($arttributes_varients);
            }
        } else {
            $varient = Varient::create([
                'quantity' => $data['quantity'],
                'price' => $data['price'],
                'sku' => $data['sku'],
                'product_id' => $product->id,
            ]);
        }



    }






=======
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
>>>>>>> refs/remotes/origin/main
    public function getimagesInfo($request)
    {
        $images=[];
        $files=json_decode($request->images,true);
        foreach ($files as $file)
        {

            array_push($images,['name'=>substr($file['path'],strrpos($file['path'],'/')+1) ,
<<<<<<< HEAD
                'size'=>Storage::disk('public')->size($file['path']) ,
                'lastModified'=> Storage::disk('public')->lastModified($file['path']),
                'is_main'=>(int)$file['is_main'],
                'path'=>$file['path'],
                'id'=>$file['id']
            ]);
=======
            'size'=>Storage::disk('public')->size($file['path']) ,
            'lastModified'=> Storage::disk('public')->lastModified($file['path']),
            'is_main'=>(int)$file['is_main'],
            'path'=>$file['path'],
            'id'=>$file['id']


        ]);
>>>>>>> refs/remotes/origin/main

        }
        return $images;

    }

<<<<<<< HEAD



    public function getByID($id,$columns=['*'],$relations=[''])
    {
        return Product::with($relations)->select($columns)->findOrFail($id);

    }

=======
    public function update($request){
          dd($request);
    }

    public function delete($id)
    {
        $this->getByID($id)->delete();
        return ;

    }


>>>>>>> refs/remotes/origin/main
}
