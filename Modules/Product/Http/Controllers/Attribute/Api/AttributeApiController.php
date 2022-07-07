<?php

namespace Modules\Product\Http\Controllers\Attribute\Api;

use Attribute;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Product\Http\Requests\Attribute\AttributeStoreRequest;
use Modules\Product\Http\Requests\Attribute\AttributeUpdateRequest;
use Modules\Product\Transformers\Attribute\AttributeResource;
use Modules\Product\Repositories\Attribute\AttributeInterface;

class AttributeApiController extends Controller
{

    private $attributeRepo;

    public function __construct(AttributeInterface $attributenterface)
    {
          $this->attributeRepo=$attributenterface;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return AttributeResource::collection($this->attributeRepo->get(
            ['id','name','type','created_at'],
            [],
            (int)request()->perpage

        ));
    }

    public function getall()
    {

        return AttributeResource::collection($this->attributeRepo->get(
            ['id','name'],
            [],
             0,

        ));
    }



    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(AttributeStoreRequest $request)
    {
        $attribute=$this->attributeRepo->store($request);
        return AttributeResource::make($attribute);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(AttributeUpdateRequest $request, $id)
    {
        $attribute=$this->attributeRepo->update($id,$request,[]);
        return AttributeResource::make($attribute);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->attributeRepo->delete($id);
    }
}
