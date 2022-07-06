<?php

namespace Modules\Product\Repository\Category;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Modules\Product\Entities\Category\Category;

class CategoryRepository implements CategoryRepositoryInterface
{

    private $path = 'Gallery/Category/';

    public function allCategories($data , $paginate = 0 ,  $columns = ['*'] , $relations = ['*'])
    {
        $categories = Category::query();
        if( isset($_GET['search'])){
            $categories = Category::query()->search($data->search);
        }


         if(checkPagination($paginate))
           $categories = $categories->simplePaginate($paginate);

         else
            $categories=$categories->get();

        return $categories;
    }

    public function storeCategory($request)
    {
        if ($request->hasFile('image')) {
            $image = $this->path . storeImage($this->path , $request->image);
        }

        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'status' => $request->status,
            'parent_id' => $request->parent_id,
            'image' => $image,
        ]);


    }

    public function updateCategory($request , $id)
    {

        $category = findById($id , new Category);

        if ($request->hasFile('image')) {
            if ($category->image) {
                $category->image = $this->path . editImage($this->path , $request->image , $category->image);
            }
        }
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'status' => $request->status,
            'parent_id' => $request->parent_id,
            'image' => $category->image,
        ]);


    }



    public function deleteCategory($id)
    {

        $category = findById($id , new Category);
        if ($category->image) {
            deleteImage($category->image);
        }
        $category->delete();
    }


    // public function getMinParentCategories ($id = '') {
    //     $categories = Category::where('id' , '!=' , $id)->select('id' , 'name')->doesntHave('parent.parent.parent')->get();
    //     return $categories;
    // }


    // public function getParentsCategories ($id = '') {
    //     $categories = Category::query()->with("parent")->get();
    //     $tree = collect([]);
    //     foreach($categories as $category){
    //         if($category->getParents()->count() < 3){
    //             if($category->id != $id)
    //                 $tree->push($category);
    //         }
    //     }
    //     return $tree;
    // }

}
