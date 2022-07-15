<?php

namespace Modules\Product\Http\Controllers\Product\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Support\Renderable;
use Modules\Product\Transformers\Product\ProductResource;
use Modules\Product\Repository\Product\ProductRepositoryInterface;

class ProductApiController extends Controller
{
    private $ProductRepo;

    public function __construct(ProductRepositoryInterface $ProductRepo)
    {
        $this->ProductRepo = $ProductRepo;
    }

    public function getFilesInfo(Request $request)
    {

        return $this->ProductRepo->getimagesInfo($request);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {

        $products=Cache::put('products',$this->ProductRepo->index(
            ['id','name','category_id','brand_id'],
              (int)request()->paginate,
              ['category:id,name','brand:id,name','mainimage:path,product_id']
            ),60);

            if(Cache::has('products'))
            $products=Cache::get('products');
            else
            $products=$this->ProductRepo->index(
                ['id','name','category_id','brand_id'],
                  (int)request()->paginate,
                  ['category:id,name','brand:id,name','mainimage:path,product_id']
                );
       return ProductResource::collection($products);
    }



    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data=$request["product"];
        $decoded_data=json_decode($request["product"] , true);
        $request_data=new Request($decoded_data);
        $validated=Validator::make($request_data->all() , [
            "name" =>"required",
            "varients" =>"required" ,
            "varients.*.price"=>"required|max:8|integer|min:1",
        ]);
        dd($validated->errors());
        $this->ProductRepo->store($request);
    }




    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request)
    {
        dd($request);
        $product=$this->ProductRepo->update($request);
        dd($product);
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
       $this->ProductRepo->delete($id);
        return response()->json([
            'message'=>'Product has been deleted',

        ],200);
    }
}
