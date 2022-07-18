<?php




namespace Modules\Product\Repository\Comment;

use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Auth;
use Modules\Product\Filters\Comment\Search;
use Modules\Product\Entities\Comment\Comment;
use Modules\Product\Repository\Actions\ActionUserInterface;
use Modules\Product\Repository\Comment\CommenttInterface;
use Modules\Product\Repository\Product\ProductRepositoryInterface;

class CommentRepository implements ActionUserInterface{


    public function index($columns=['*'],$relations=[''],$paginate=25){
        return app(Pipeline::class)
        ->send(Comment::query())
        ->through([
            Search::class

        ])
        ->thenReturn()
        ->with($relations)
        ->select($columns)
        ->paginate($paginate);

    }
    public function createorupdate($id, $value) // $id for entity
    {
        $user=$this->getUser();
        $rate=$user->comment($id,$value);
        return $rate;

    }
    public function delete($id){    // $id for comment
        $user=$this->getUser();
         $user->uncomment($id)->delete();


    }
    public function getUser()
    {
        return Auth::user();
    }

    public function  admindelete($id)
    {
        $comment=findById($id,new Comment,[]);
        $comment->delete();
        return;

    }
}
