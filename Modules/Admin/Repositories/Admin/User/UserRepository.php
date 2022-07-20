<?php

namespace Modules\Admin\Repositories\Admin\User;

use App\Models\User;
use Illuminate\Routing\Pipeline;
use Modules\Product\Filters\Brand\Search;

class UserRepository implements UserRepositoryInterface {

    public function users($columns = ['*'], $paginate = 0, $relations = ['*'])
    {
        $users = app(Pipeline::class)
            ->send(User::query())
            ->through([Search::class])
            ->thenReturn()
            ->select($columns);

        if (checkPagination($paginate))
            $users = $users->paginate($paginate);
        else
            $users = $users->get();

        return $users;
    }

    public function changeStatus($id)
    {
        $user = findById($id , new User);
        $user->status == 1 ? $user->status = 0 : $user->status = 1;
        $user->save();
        return response()->json([
            'message' => 'User Status Updated Successfully'
        ],200);
    }

    public function Delete($id)
    {
        $user = findById($id , new User);
        $user->delete();
    }
}


?>
