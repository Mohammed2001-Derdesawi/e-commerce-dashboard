<?php

namespace Modules\Admin\Repositories\Admin\Interfaces;

interface AuthorzationInterface {
    public function getRoles();
    public function getPermissions();
    public function findRole($role);
    public function syncRolePermissions($role,$permissions);
    public function assignRolePermissions($role,$permissions);
    public function createRole($request);
    public function updateRole($role,$request);
    public function assignRoleToAdmin($role,$admin);
    public function getRolePermissions($role);


}



























?>
