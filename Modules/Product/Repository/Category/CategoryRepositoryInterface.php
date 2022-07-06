<?php

namespace Modules\Product\Repository\Category;

interface CategoryRepositoryInterface {

    public function allCategories ($data ,  $paginate = 0 ,  $columns = ['*'] , $relations = ['*']);

    public function storeCategory($request);

    public function updateCategory($id , $request);

    public function deleteCategory($id);




    // public function getMinParentCategories($id);

    // public function getParentsCategories($id);

}
















?>
