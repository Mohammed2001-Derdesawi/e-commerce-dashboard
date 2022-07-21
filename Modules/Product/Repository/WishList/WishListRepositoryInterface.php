<?php

namespace Modules\Product\Repository\WishList;

interface WishListRepositoryInterface {
    public function store($data);
    public function delete($id);
}


?>
