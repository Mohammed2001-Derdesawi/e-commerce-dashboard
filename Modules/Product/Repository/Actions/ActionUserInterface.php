<?php

namespace Modules\Product\Repository\Actions;

interface ActionUserInterface {

    public function index($columns=['*'],$relations=[''],$paginate=25);
    public function delete($id);
    public function createorupdate($id,$value);
    public function getUser();
    public function  admindelete($id);

}
