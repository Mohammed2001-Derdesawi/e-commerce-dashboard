<?php

namespace Modules\Product\Repository\Category;

use Illuminate\Support\Str;
use Modules\Product\Entities\Category;
use Illuminate\Support\Facades\Storage;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function allCategories($data)
    {

        if( isset($_GET['search'])){

            $search_text = $_GET['search'];
            return $categories = Category::where('name','LIKE','%'.$search_text.'%')
            ->orwhere('description' , 'LIKE' , '%'.$search_text.'%')
            ->simplePaginate(10);
            
        }else{
            return $categories = Category::select('id' , 'name', 'description',
                'meta_title', 'meta_keywords', 'status', 'image', 'parent_id')->simplePaginate(10);
        }

    }

    public function storeCategory($request)
    {

        // dd($request);
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->meta_title = $request->meta_title;
        $category->meta_keywords = $request->meta_keywords;
        $category->status = $request->status;

        if ($request->parent_id != 'NULL') {
            $category->parent_id = $request->parent_id;
        }
        

        if ($request->hasFile('image')) {
            $category->image = storeImage('images/categories' , $request->image);
        }

        $category->save();


    }

    public function updateCategory($request , $id)
    {

        $category = Category::findOrFail($id);

        $category->name = $request->name;
        $category->description = $request->description;
        $category->meta_title = $request->meta_title;
        $category->meta_keywords = $request->meta_keywords;
        $category->status = $request->status;

        if ($request->parent_id != 'NULL') {
            $category->parent_id = $request->parent_id;

        } else {
            $category->parent_id = NULL;
        }

        if ($request->hasFile('image')) {
            if ($category->image) {
                $category->image = editImage('images/categories/' , $request->image , $category->image);
            }
        }

        $category->save();


    }



    public function deleteCategory($id)
    {

        $category = Category::findOrFail($id);
        if ($category->image) {
            deleteImage('images/categories/' , $category->image);
        }
        
        $category->delete();


    }

}
