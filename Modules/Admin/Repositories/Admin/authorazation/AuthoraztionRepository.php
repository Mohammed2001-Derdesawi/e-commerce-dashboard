<?php
namespace Modules\Admin\Repositories\Admin\authorazation;

use Modules\Admin\Entities\Admin\Admin;
use Modules\Admin\Entities\Authorization\Role;
use Modules\Admin\Entities\Authorization\Permission;
use Modules\Admin\Repositories\Admin\authorazation\AuthorzationInterface;

use function PHPUnit\Framework\returnSelf;

class AuthoraztionRepository implements AuthoraztionInterface
{
    public function getRoles($params=['name'])
    {
        // DB::raw('select `name`, `id`, `created_at`, ( select count(*) from `admins` inner join `model_has_roles` on `admins`.`id` = `model_has_roles`.`model_id` where `roles`.`id` = `model_has_roles`.`role_id` ) as `admin_count` from `roles` order by `created_at` desc; ')
          return Role::with('permissions:name')->select($params)->orderBy('created_at','desc')->withCount('users as admin_count')->withCount('permissions')->get();



    }

    public function findRole($role,$relations=[]){

        return Role::with($relations)->findOrFail($role);
    }
    public function getAllPermission($paginate=0)
    {
        if($paginate)
        return Permission::select('name','id')->paginate($paginate);

        return Permission::select('name','id')->get();

    }
    public function syncRolePermissions($role,$permissions){


            $role->syncPermissions($permissions);
            return $role;

    }
     public function getAdminsByRole($role)
    {
           if(request()->search)
            return Admin::filter(request()->search)->role($role)->paginate(10);

       return Admin::role($role)->paginate(5);
    }
    public function assignRolePermissions($role,$permissions){

           $role->givePermissionTo($permissions);




    }
    public function createRole($request){
          $role=Role::create([
            'name'=>$request->name,
            'guard_name'=>'admin'
             ]);
          return $this->assignRolePermissions($role,$request->permissions);
    }
    public function updateRole($role,$request){


            $role->update([
                'name'=>$request->name
               ]);
             $role=$this->syncRolePermissions($role,$request->permissions);
             return $role;





    }
    public function assignRolesToAdmin($roles,$admin){

            $admin->assignRole($roles);

    }
    public function revokeRolesToAdmin($roles,$admin){

        $admin->removeRole($roles);
        return $admin;

}
    public function getRolePermissions($role){
        return $role->permissions;
    }
    public function updateRolesToAdmin($roles,$admin){
        $admin->syncRoles($roles);
        return $admin;
    }

    public function deleteRole($role)
    {
        $role=$this->findRole($role);
        dd($role);
        $role->delete();
        return $role;

    }
    public function deleteAdminFormRole($admin,$role)
    {
        $admin=Admin::where('email',$admin)->first();
        if(!$admin)
        abort(404);
        $admin=$this->revokeRolesToAdmin($role,$admin);
        return $admin;

    }

}



















?>
