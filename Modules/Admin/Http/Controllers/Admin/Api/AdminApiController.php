<?php

namespace Modules\Admin\Http\Controllers\Admin\Api;


use Modules\Admin\Repositories\Admin\AdminInterface;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Admin\Http\Requests\Admin\AdminStoreRequest;
use Modules\Admin\Transformers\Admin\AdminResource;

class AdminApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $adminRepo;
    public function __construct(AdminInterface $admininterface)
    {
        $this->adminRepo=$admininterface;

    }
    public function getAdmins()
    {
       return AdminResource::collection($this->adminRepo->getAdmins(
           request()->paginate??15,
           ['roles:id,name'],
           ['email','username','created_at','last_login_at','status','avatar','id']
       ));

    }

    public function changeStatusAdmin(Request $request)

    {
       $this->adminRepo->changestatus($request->email);
    }
    // public function serachAdmin(Request $request)
    // {
    //     $admins=$this->adminRepo->searchAdmin($request,$paginate=15);
    //     return AdminResource::collection($admins);

    // }
    public function deleteAdmin(Request $request)
    {
         $this->adminRepo->deleteadmin($request->email);

    }

    public function store(AdminStoreRequest $request)
    {
      $this->adminRepo->storeAdmin($request);


    }


}
