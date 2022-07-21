<?php

namespace Modules\Product\Http\Controllers\Brand\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Product\Http\Requests\Brand\BrandRequest;
use Modules\Product\Transformers\Brand\BrandResource;
use Modules\Product\Http\Requests\Brand\UpdateBrandRequest;
use Modules\Product\Repository\Brand\BrandRepositoryInterface;

class BrandApiController extends Controller
{
    private $BrandRepo;

    public function __construct(BrandRepositoryInterface $BrandRepo) {
        $this->BrandRepo = $BrandRepo;
    }

    public function index()
    {
        return BrandResource::collection($this->BrandRepo->Brands(['id','name' , 'image'] , 2 , $relations = ['']));
    }



    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(BrandRequest $request)
    {
        $this->BrandRepo->Store($request);
    }




    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateBrandRequest $request, $id)
    {
        $this->BrandRepo->Edit($request , $id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->BrandRepo->Delete($id);
    }

    public function brands()
    {
        return BrandResource::collection($this->BrandRepo->Brands(['id','name'] , 0 , $relations = ['']));
    }
}
