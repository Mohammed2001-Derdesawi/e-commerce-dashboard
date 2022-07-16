<?php

namespace Modules\Product\Http\Controllers\Product\Api;

use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('product::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $data_request = $request;
        $data = json_decode($request->product , true);
        $request = new Request($data);
        $validator = Validator::make($request->all() , [
            'mainimage' => 'required|image|mimes:png,jpg,jpeg,gif',
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'brand_id' => 'required',
            'category' => 'required',
            'tax' => 'nullable',
            'images' => 'required',
            'images.*' => 'mimes:png,jpg,jpeg,gif',
            'weight' => 'required',
            'dimension.width' => 'required',
            'dimension.height' => 'required',
            'dimension.length' => 'required',
            'meta.name' => 'required',
            'meta.description' => 'required',
            'meta.keywords' => 'required',

            'varients.*.price' => [Rule::requiredIf(function() use ($request) {
                return $request->varients != null ?? false;
            })],
            'varients.*.quantity' => [Rule::requiredIf(function() use ($request) {
                return $request->varients != null ?? false;
            })],
            'varients.*.sku' => [Rule::requiredIf(function() use ($request) {
                return $request->varients != null ?? false;
            })],

            'varients' => 'nullable',



            'price' => [Rule::requiredIf(function() use ($request) {
                return $request->varients == null ?? false;
            })],

            'quantity' => [Rule::requiredIf(function() use ($request) {
                return $request->varients == null ?? false;
            })],

            'sku' => [Rule::requiredIf(function() use ($request) {
                return $request->varients == null ?? false;
            })],


        ] , [
            'dimension.width.required' => 'The width field is required.',
            'dimension.height.required' => 'The height field is required.',
            'dimension.length.required' => 'The length field is required.',
            'meta.name.required' => 'The meta name field is required.',
            'meta.description.required' => 'The meta description field is required.',
            'meta.keywords.required' => 'The meta keywords field is required.',

            'varients.*.price.required' => 'This price is required.',
            'varients.*.quantity.required' => 'This quantity is required.',
            'varients.*.sku.required' => 'This sku is required.',
        ]);

        if($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'status' => 422
            ]);
        } else {
            $this->ProductRepo->store($data_request);
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('product::show');
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $data_request = $request;
        $data = json_decode($request->product , true);
        $request = new Request($data);
//        dd($request);
        $validator = Validator::make($request->all() , [
            'mainimage' => 'nullable|image|mimes:png,jpg,jpeg,gif',
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'brand_id' => 'required',
            'category_id' => 'required',
            'tax' => 'nullable',
            'images' => 'nullable',
            'images.*' => 'mimes:png,jpg,jpeg,gif',
            'weight' => 'required',
            'width' => 'required',
            'height' => 'required',
            'length' => 'required',
            'meta_name' => 'required',
            'meta_description' => 'required',
            'meta_keywords' => 'required',

            'varients.*.price' => [Rule::requiredIf(function() use ($request) {
                return $request->varients != null ?? false;
            })],
            'varients.*.quantity' => [Rule::requiredIf(function() use ($request) {
                return $request->varients != null ?? false;
            })],
            'varients.*.sku' => [Rule::requiredIf(function() use ($request) {
                return $request->varients != null ?? false;
            })],

            'varients' => 'nullable',



            'price' => [Rule::requiredIf(function() use ($request) {
                return $request->varients == null ?? false;
            })],

            'quantity' => [Rule::requiredIf(function() use ($request) {
                return $request->varients == null ?? false;
            })],

            'sku' => [Rule::requiredIf(function() use ($request) {
                return $request->varients == null ?? false;
            })],


        ] , [
            'dimension.width.required' => 'The width field is required.',
            'dimension.height.required' => 'The height field is required.',
            'dimension.length.required' => 'The length field is required.',
            'meta.name.required' => 'The meta name field is required.',
            'meta.description.required' => 'The meta description field is required.',
            'meta.keywords.required' => 'The meta keywords field is required.',

            'varients.*.price.required' => 'This price is required.',
            'varients.*.quantity.required' => 'This quantity is required.',
            'varients.*.sku.required' => 'This sku is required.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
                'status' => 422
            ]);
        }
        $this->ProductRepo->update($data_request);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
