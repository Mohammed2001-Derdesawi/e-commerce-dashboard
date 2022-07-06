<?php 

namespace Modules\Product\Repository\Brand;

interface BrandRepositoryInterface {

    public function Brands($columns = ['*'] , $paginate = 0 , $relations = ['*']);

    public function Store($request);

    public function Edit($request , $id);

    public function Delete($id);
}




?>