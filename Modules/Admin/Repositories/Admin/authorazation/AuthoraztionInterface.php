<?php

namespace Modules\Admin\Repositories\Admin\authorazation;

interface AuthoraztionInterface {
    public function getRoles($params=[],$relations=[]);
    public function findRole($role,$relations=[]);
    public function syncRolePermissions($role,$permissions);
    public function assignRolePermissions($role,$permissions);
    public function createRole($request);
    public function deleteRole($role);
    public function updateRole($role,$request);
    public function assignRolesToAdmin($role,$admin);
    public function getRolePermissions($role);
    public function updateRolesToAdmin($roles,$admin);
    public function getAllPermission($paginate);
    public function getAdminsByRole($role);
    public function deleteAdminFormRole($admin,$role);
    public function revokeRolesToAdmin($roles,$admin);


}



























?>
