<?php
 namespace Modules\Admin\Repositories\Admin;


 interface AdminInterface{
    public function findAdminById($id);
    public function getAdmins($request,$paginate=15);
    public function storeAdmin($request);
    public function updateadminprofile($request,$email);
    public function updatemyprofile($request);
    public function deleteadmin($id);
    public function changestatus($id);
    public function updateEmailProfile($request);
    public function updatedPasswordProfile($request);
    public function updatedPasswordAdmin($request,$email);
    public function updatedadminEmail($request,$email);
    public function searchAdmin($request);
    public function findAdminByEmail($email,$relations=[]);





 }









?>
