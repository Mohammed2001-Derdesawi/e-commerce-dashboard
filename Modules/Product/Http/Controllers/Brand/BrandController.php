<?php

namespace Modules\Product\Http\Controllers\Brand;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Brand\Brand;
use Illuminate\Contracts\Support\Renderable;
use Modules\Product\Repository\Brand\BrandRepositoryInterface;

class BrandController extends Controller
{


    private $BrandRepo;

    public function __construct(BrandRepositoryInterface $BrandRepo) {
        $this->BrandRepo = $BrandRepo;
    }




    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('product::Brand.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('product::Brand.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
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
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $brand = findById($id , new Brand);
        return view('product::Brand.edit')->with('brand' , json_encode($brand));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
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
