<?php
namespace Modules\Admin\Repositories\Admin;


use Modules\Admin\Entities\Authorization\Role;
use Modules\Admin\Repositories\Admin\Interfaces\AuthorzationInterface;

class AuthrozationRepository implements AuthorzationInterface
{
    public function getRoles()
    {
        return Role::select('name')->paginate(10);

    }
    public function getPermissions(){
        return Role::select('name')->paginate(10);

    }
    public function findRole($role){
        return Role::findById($role)??null;
    }
    public function syncRolePermissions($role,$permissions){


            $role->syncPermissions($permissions);
            return $role;





    }
    public function assignRolePermissions($role,$permissions){

           $role->givePermissionTo($permissions);




    }
    public function createRole($request){
           return Role::create([
            'name'=>$request->name,
            'guard_name'=>'Admin'
           ]);
    }
    public function updateRole($role,$request){


            $role->update([
                'name'=>$request->name
               ]);
               return $role;





    }
    public function assignRoleToAdmin($role,$admin){

            $admin->assignRole($role);

    }
    public function getRolePermissions($role){
        return $role->permissions;
    }

}



















?>
