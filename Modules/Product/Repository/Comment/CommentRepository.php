<?php




namespace Modules\Product\Repository\Comment;

use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Auth;
use Modules\Product\Filters\Comment\Search;
use Modules\Product\Entities\Comment\Comment;
use Modules\Product\Repository\Comment\CommenttInterface;
use Modules\Product\Repository\Product\ProductRepositoryInterface;

class CommentRepository implements CommenttInterface{

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
    public function store($product,$body)
    {
       $product=$this->prodRepo->getByID($product);
       $product->comments()->create([
        'body'=>$body,
        'user_id'=>Auth::user()->id,
       ]);
       return $product;
    }
    public function getCommenttById($id){
        return Comment::findOrFail($id);

    }
    public function update($id,$body){
        $commnet=$this->getCommenttById($id);
        $commnet->body=$body;
        $commnet->save;
        return $commnet;

    }
    public function delete($id){
        $this->getCommenttById($id)->delete();


    }
}
