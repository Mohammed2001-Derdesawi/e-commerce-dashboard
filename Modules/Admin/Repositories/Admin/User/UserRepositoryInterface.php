<?php

namespace Modules\Admin\Repositories\Admin\User;

interface UserRepositoryInterface {
    public function users($columns = ['*'] , $paginate = 0 , $relations = ['*']);
    public function changeStatus($id);
    public function Delete($id);
}

?>
