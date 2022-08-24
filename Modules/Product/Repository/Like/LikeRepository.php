<?php

namespace Modules\Product\Repository\Like;

use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Auth;
use Modules\Product\Entities\Like\Like;
use Modules\Product\Filters\Like\Like as LikeLike;
use Modules\Product\Filters\Like\Search;
use Modules\Product\Repository\Actions\ActionUserInterface;


class LikeRepository implements ActionUserInterface{


    public function index($columns=['*'],$relations=[''],$paginate=25){
        return app(Pipeline::class)
        ->send(Like::query())
        ->through([
            Search::class,
            LikeLike::class,

        ])
        ->thenReturn()
        ->with($relations)
        ->select($columns)
        ->paginate($paginate);

    }
    public function createorupdate($id, $value) // $id for entity
    {
        $user=$this->getUser();
        $like=$user->like($id,$value);
        return $like;

    }
    public function delete($id){    // $id for comment
        $user=$this->getUser();
         $user->unlike($id)->delete();


    }
    public function getUser()
    {
        return Auth::user();
    }

  
    public function admindelete($id)
    {
        
    }
    
}

