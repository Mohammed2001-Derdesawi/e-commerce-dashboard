<?php 

namespace Modules\Product\Repository\Brand;

use Illuminate\Pipeline\Pipeline;
use Modules\Product\Entities\Brand\Brand;
use Modules\Product\Filters\Brand\Search;
use Modules\Product\Repository\Brand\BrandRepositoryInterface;

class BrandRepository implements BrandRepositoryInterface {


    private $path = 'Gallery/Brand/';



    public function Brands($columns = ['*'] , $paginate = 0 , $relations = ['*']) {

        $brands = app(Pipeline::class)
        ->send(Brand::query())
        ->through([
            Search::class,
        ])
        ->thenReturn()
        // ->with($relations)
        ->select($columns);

        if (checkPagination($paginate))
            $brands = $brands->paginate($paginate);
        else
            $brands = $brands->get();

        return $brands;
    }


    public function Store($request) {
        if ($request->file('image')) {
            $image = $this->path . storeImage($this->path , $request->image);
        }

        $brand = Brand::create([
            'name' => $request->name,
            'image' => $image,
        ]);

        return $brand;
    }



    public function Edit($request , $id) {
        $brand = findById($id , new Brand);
        if ($request->file('image')) {
            if ($brand->image) {
                $brand->image = $this->path . editImage($this->path , $request->image , $brand->image);
            }
        }

        $brand->update([
            'name' => $request->name,
            'image' => $brand->image,
        ]);
    }



    public function Delete($id) {
        $brand = findById($id , new Brand);
        // if ($brand->image) {
            deleteImage($brand->image);
        // }
        $brand->delete();
    }
}