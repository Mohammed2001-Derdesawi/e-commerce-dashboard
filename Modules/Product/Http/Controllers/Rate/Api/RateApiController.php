<?php

namespace Modules\Product\Http\Controllers\Rate\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Builder;
use Modules\Product\Entities\Rate\Rate;
use Illuminate\Contracts\Support\Renderable;
use Modules\Product\Repository\Rate\RateInterface;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Modules\Product\Entities\Product\Product;
use Modules\Product\Repository\Actions\ActionUserInterface;
use Modules\Product\Transformers\Rate\RateResource;

class RateApiController extends Controller
{
     protected $rateRepo;
    public function __construct(ActionUserInterface $rateInterface)
    {
        $this->rateRepo = $rateInterface;
    }
    public function index()
    {
        return RateResource::collection($this->rateRepo->index(
            ['id', 'rate', 'user_id', 'rateable_id', 'rateable_type'],
            [
                'user:id,name', 'rateable'
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
    public function store(Request $request, $product_id)
    {
       $product= $this->rateRepo->createorupdate($product_id,$request->rate);
       return $this->ReturnMessage( [
        'product'=>$product,
        'message'=>'Rate has been Created for this product with id = '.$product_id
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
        $this->rateRepo->createorupdate($product_id,$request->rate);
        return $this->ReturnMessage( [
            'message'=>'Rate has been updated for this product with id = '.$product_id
        ]);
    }

    public function userdelete($id)
    {
        $this->rateRepo->delete($id);
        return $this->ReturnMessage( [

            'message'=>'Rate has been deleted'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->rateRepo->admindelete($id);
        return response()->json([
            'message' => 'Rate has been Deleted'

        ]);
    }

    public function ReturnMessage($json)
    {
        return response()->json($json);
    }
}
