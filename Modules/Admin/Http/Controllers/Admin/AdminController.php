<?php

namespace Modules\Admin\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Validated;
use Illuminate\Contracts\Support\Renderable;
use Modules\Admin\Repositories\Admin\AdminInterface;
use Modules\Admin\Http\Requests\Admin\UpdateMainDetailsRequest;
use Modules\Admin\Http\Requests\Admin\UpdateAdminPasswordRequest;

class AdminController extends Controller
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
    public function index()
    {

        return view('admin::Admin.admin.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($email)
    {
        $relations=['roles:id,name'];
        $admin=$this->adminRepo->findAdminByEmail($email,$relations);
        $roles=$this->adminRepo->getRoleRepo()->getRoles();

        return view('admin::Admin.admin.edit',compact('admin','roles'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function updatemainDetails(UpdateMainDetailsRequest $request, $email)
    {
         $admin=$this->adminRepo->updateadminprofile($request,$email);

         return redirect()->route('admin.edit',$admin->email)->with('success','Admin  Update Successfull');

    }
    public function updateadminPassword($email,Request $request)
    {
         $validated=$request->validate([
            'password'=>'required|max:15,|min:8|confirmed|string'

         ]);
         if(!$validated)
         return redirect()->route('admin.edit',$email)->with('password',$validated);;

         $admin=$this->adminRepo->updatedPasswordAdmin($request,$email);
         return redirect()->route('admin.edit',$admin->email)->with('success','Password Admin  Updated Successfull');
    }
    public function updateadmiEmail($email,Request $request)
    {
         $validated=$request->validate([
            'email'=>'required|min:10|max:25|unique:admins,email|email',
            'password'=>'required|max:15,|min:8|string',


         ]);
         if(!$validated)
         return redirect()->route('admin.edit',$email)->withErrors($validated);

         $admin=$this->adminRepo->findAdminByEmail($email);
         if(Hash::check($request->password,$admin->password))
         {
            $admin=$this->adminRepo->updatedadminEmail($admin,$request->email);
            return redirect()->route('admin.edit',$admin->email)->with('success','Email Admin Updated Successfull');


         }
         return redirect()->route('admin.edit',$email)->with('password_faild','current password incorrect');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function deleteAdmin($email)
    {
         $this->adminRepo->deleteadmin($email);

    }


}
