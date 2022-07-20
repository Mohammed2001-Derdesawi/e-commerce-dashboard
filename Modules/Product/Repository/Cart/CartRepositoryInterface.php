<?php

namespace Modules\Product\Repository\Cart;

interface CartRepositoryInterface {
    public function store($data);
    public function delete($id);
}
?>
