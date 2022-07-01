<?php

namespace Modules\Admin\Http\Controllers\Authorzation\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Admin\Http\Requests\Auhtorzation\RoleRequest;
use Modules\Admin\Transformers\Authorzation\RoleResource;
use Modules\Admin\Transformers\Authorzation\PermissionResource;
use Modules\Admin\Repositories\Admin\authorazation\AuthoraztionInterface;
use Modules\Admin\Transformers\Admin\AdminResource;
use PhpParser\Node\Stmt\Return_;

class RoleApiController extends Controller
{
      private $roleRepo;
      public function __construct(AuthoraztionInterface $authinterface)
      {
         $this->roleRepo=$authinterface;
      }
    public function getRoles()
    {
        return RoleResource::collection($this->roleRepo->getRoles(['name','id','created_at']));
    }
    public function storeRole(RoleRequest $request)
    {
        $this->roleRepo->createRole($request);
    }
    public function getAdminsRole(Request $request)
    {

         return AdminResource::collection( $this->roleRepo->getAdminsByRole($request->role));

    }

    public function deleteAdminFormRole(Request $request)
    {

         $admin=$this->roleRepo->deleteAdminFormRole($request->params['1']['email'],$request->params['0']['role']);
         return response()->json('Admin Revoke From Role Successfull',200);

    }







    public function getPermissions()
    {

        return  config('basepermissions');
    }


}
