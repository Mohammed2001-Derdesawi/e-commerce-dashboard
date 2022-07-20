<?php

namespace Modules\Product\Http\Controllers\Comment\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Support\Renderable;
use Modules\Product\Entities\Product\Product;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Modules\Product\Repository\Actions\ActionUserInterface;
use Modules\Product\Transformers\Comment\CommentResource;

class CommentApiController extends Controller
{
    protected $commentRepo;
    public function __construct(ActionUserInterface $commentInterface)
    {
        $this->commentRepo=$commentInterface;

    }
    public function index()
    {
        return CommentResource::collection($this->commentRepo->index(
            ['id','body','user_id','commentable_id','commentable_type'],
            ['user:id,name','commentable'
            =>function (MorphTo $morphTo) {
                $morphTo->constrain([
                    Product::class => function (Builder $query) {
                        $query->select(['id','name']);
                    },

                ]);
            }
        ],
            request()->paginate,
        ));

    }

     /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request,$product_id)
    {
       $product= $this->commentRepo->createorupdate($product_id,$request->body);
       return $this->ReturnMessage( [
        'product'=>$product,
        'message'=>'Comment has been Created for this product with id = '.$product_id
        ]);
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $product_id)
    {
        $product=$this->commentRepo->createorupdate($product_id,$request->body);
        return $this->ReturnMessage( [
            'product'=>$product,
            'message'=>'Comment has been updated for this product with id = '.$product_id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->commentRepo->admindelete($id);
        return $this->ReturnMessage([
            'message'=>'Comment has been Deleted'

        ]);

    }

    public function ReturnMessage($json)
    {
        return response()->json($json);


    }
    public function userdelete($id)
    {
        $this->commentRepo->delete($id);
        return $this->ReturnMessage( [

            'message'=>'Rate has been deleted'
        ]);

    }




}
