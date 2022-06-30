<?php

namespace Modules\Admin\Http\Controllers\Authorzation;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Repositories\Admin\AdminInterface;
use Modules\Admin\Repositories\Admin\authorazation\AuthoraztionInterface;
use Modules\Admin\Transformers\Authorzation\PermissionResource;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $roleRepository;
     public function __construct(AuthoraztionInterface $authorationinterface)

     {
        $this->roleRepository=$authorationinterface;

     }

    public function index()
    {

        $roles=$this->roleRepository->getRoles();

        return view('admin::Admin.authorization.index',compact('roles'));
    }
    public function show($role)
    {
        $role=$this->roleRepository->findRole($role,['permissions:name','users']);
        return view('admin::Admin.authorization.show',compact('role'));

    }




    public function edit($role)
    {
        $role=$this->roleRepository->findRole($role,['permissions:id']);
        $permissions=$this->roleRepository->getAllPermission();
        return view('admin::Admin.authorization.edit',compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $role)
    {
         $validated=$request->validate([
            'name'=>'required|min:5|max:15|string|unique:roles,name,'.$request->name.',name',

         ]);
         if(!$validated)
         return redirect()->route('admin.roles.edit',$role)->withErrors($validated);

         $role=$this->roleRepository->findRole($role);
         $role=$this->roleRepository->updateRole($role,$request);
         return redirect()->route('admin.roles.edit',$role->id)->with('success','Role Updated Successfull');

    }
    public function destroy($role){
        $role=$this->roleRepository->deleteRole($role);
        if(str_starts_with($role,'No'))
        return redirect()->route('admin.roles')->with('faild',$role);

        return redirect()->route('admin.roles')->with('success',$role);

    }


}
