<?php

namespace Modules\Admin\Http\Controllers\User;


use Illuminate\Routing\Controller;
use Modules\Admin\Repositories\Admin\User\UserRepositoryInterface;
use Modules\Admin\Transformers\User\UserResource;

class UserApiController extends Controller
{
    protected $UserRepo;
    public function __construct(UserRepositoryInterface $UserRepo) {
        $this->UserRepo = $UserRepo;
    }


    public function index()
    {
        return UserResource::collection($this->UserRepo->users(['id' , 'name' , 'email' , 'status'] , 10 , $relations = ['*']));
    }

    public function delete ($id) {
        $this->UserRepo->Delete($id);
    }

    public function changeStatus ($id) {
        $this->UserRepo->changeStatus($id);
    }
}
