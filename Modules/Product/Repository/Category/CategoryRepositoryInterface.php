<?php 

namespace Modules\Product\Repository\Category;

interface CategoryRepositoryInterface {
    
    public function allCategories ($data);

    public function storeCategory($request);

    public function updateCategory($id , $request);

    public function deleteCategory($id);

    // public function searchCategory($data);
}
















?>