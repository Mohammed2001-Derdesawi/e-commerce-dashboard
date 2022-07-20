<?php

namespace Modules\Product\Repository\Actions;

interface ActionUserInterface {

    public function index($columns=['*'],$relations=[''],$paginate=25);
    public function delete($id);
    public function createorupdate($id,$value);
    public function getUser();
<<<<<<< HEAD
=======
    public function  admindelete($id);
>>>>>>> 10bdf55e56e5d580f8b241021bdf87d286193de8

}
