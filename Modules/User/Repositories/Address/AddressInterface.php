<?php
namespace Modules\User\Repositories\Address;

interface AddressInterface {
    public function index();
    public function create($request);
    public function update($request , $id);
    public function delete($id);
}