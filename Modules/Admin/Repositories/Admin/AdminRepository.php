<?php
namespace Modules\Admin\Repositories\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Entities\Admin\Admin;
use Modules\Admin\Repositories\Admin\AdminInterface;
use Modules\Admin\Repositories\Admin\authorazation\AuthoraztionInterface;

class AdminRepository implements AdminInterface
{

    private $admin;
    private $avatarslink='Galary/admin/avatars';
    private $roleRepo;

    public function __construct(AuthoraztionInterface $authinterface)
    {
             $this->roleRepo=$authinterface;
    }
    public function getAdmins($request,$paginate=15){

        return Admin::query()->admin($request->filter);

    }
    public function getRoleRepo()
    {
        return $this->roleRepo;
    }
    public function findAdminById($id)
    {
         return Admin::findOrFail($id)->first();
    }
    public function storeAdmin($request){
        if($request->file('avatar'))
        {
            $file=$request->file('avatar');
            $filename=$this->avatarslink.'/'.SaveImage($this->avatarslink,$file);

        }
        $admin=Admin::create([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'avatar'=>$filename??null,
        ]);
        if($request->has('roles'))
        $this->roleRepo->assignRolesToAdmin($request->roles,$admin);
        if(!$admin)
        return false;

        return $admin;
    }
    public function setAdmin($admin)
    {
        $this->admin=$admin;
    }
    public function updateadminprofile($request,$email){
        $relations=['roles:id,name'];
         $admin=$this->findAdminByEmail($email,$relations);
         $admin->username=$request->username;

         if($request->file('avatar'))
         {

            if($admin->avatar)
            unlink(public_path($admin->avatar));
            $file=$request->file('avatar');
            $filename=SaveImage($this->avatarslink,$file);
            $admin->avatar=$this->avatarslink.'/'.$filename;

         }
         $admin->save();
        $this->roleRepo->updateRolesToAdmin($request->roles,$admin);
         return $admin;
    }
    public function updatemyprofile($request){
        // $admin=Auth::guard('admin')->user();
        $this->admin->username=$request->username;
         if($request->file('avatar'))
         {
            if($this->admin->avatar)
            unlink(public_path($this->admin->avatar));
            $file=$request->file('avatar');
            $filename=SaveImage($this->avatarslink,$file);
            $this->admin->avatar=$this->avatarslink.'/'.$filename;
         }
         $this->admin->save();
         return $this->admin;

    }
    public function deleteadmin($email){
        $admin=$this->findAdminByEmail($email);
        $admin->delete();

    }
    public function changestatus($email){
        $admin=$this->findAdminByEmail($email);
        $admin->status=$admin->status==1?0 : 1;
        $admin->save();
        return $admin;
    }
    public function findAdminByEmail($email,$relations=[])
    {
        return Admin::with($relations)->where('email',$email)->first()??abort(404);

    }

    public function updateEmailProfile($request)
    {

        if(Hash::check($request->password,$this->admin->password))
        {
            $this->admin->email=$request->email;

        }
        return $this->admin;




    }

    public function updatedadminEmail($admin,$email)
    {

        $admin->email=$email;
            $admin->save();
            return $this->admin;








    }
    public function updatedPasswordProfile($request)
    {

        $this->admin->password=Hash::make($request->password);
        $this->admin->save();

           return  $this->admin;

    }
    public function updatedPasswordAdmin($request,$email)
    {
       $admin=$this->findAdminByEmail($email,['roles:id,name']);
        $admin->password=Hash::make($request->password);
           return  $admin;

    }



    public function searchAdmin($request)
    {

        $admins=Admin::query()->search($request->search);
        return $admins;

    }


}













?>
