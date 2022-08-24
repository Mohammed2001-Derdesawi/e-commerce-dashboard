<?php

namespace Modules\Product\Http\Controllers\Like\Api;

use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Request;
use Modules\Product\Entities\Product\Product;
use Modules\Product\Repository\Actions\ActionUserInterface;
use Modules\Product\Transformers\Like\LikeResource;

class LikeApiController extends Controller
{
    protected $likeRepo;
    public function __construct(ActionUserInterface $likeInterface)
    {
        $this->likeRepo = $likeInterface;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
       
        return LikeResource::collection($this->likeRepo->index(
            ['id', 'like', 'user_id', 'likeable_id', 'likeable_type'],
            [
                'user:id,name', 'likeable'
                => function (MorphTo $morphTo) {
                    $morphTo->constrain([
                        Product::class => function (Builder $query) {
                            $query->select(['id', 'name']);
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
    public function createOrUpdate(Request $request, $product_id)
    {
       list($product,$message)= $this->likeRepo->createorupdate($product_id,$request->like);
       return $this->ReturnMessage( [
        'product'=>$product,
        'message'=>$request->like==1?'Like':'dislike' . ' has been '.  $message .  ' for this product with id = '.$product_id
        ]);
    }


 
    public function destroy($id)
    {
        return $this->likeRepo->delete($id);
    }
}
