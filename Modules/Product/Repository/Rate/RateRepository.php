<?php




namespace Modules\Product\Repository\Rate;

use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Auth;
use Modules\Product\Entities\Rate\Rate;
use Modules\Product\Filters\Rate\Search;
use Modules\Product\Repository\Rate\RateInterface;
use Modules\Product\Repository\Product\ProductRepositoryInterface;

class RateRepository implements RateInterface{
    protected $prodRepo;
    public function __construct(ProductRepositoryInterface $interface)
    {
        $this->prodRepo=$interface;

    }
    public function index($columns=['*'],$relations=[''],$paginate=25){

        return app(Pipeline::class)
        ->send(Rate::query())
        ->through([
            Search::class

        ])
        ->thenReturn()
        ->select($columns)
        ->with($relations)
        ->paginate($paginate);

    }

    public function store($product,$rate)
    {
        $product=$this->prodRepo->getByID($product);
        $product->rates()->create([
        'rate'=>$rate,
        'user_id'=>Auth::user()->id,
       ]);
       return $product;
    }
    public function getRateById($id){
        return Rate::findOrFail($id);

    }
    public function update($id,$rate){
        $rate=$this->getRateById($id);
        $rate->rate=$rate;
        $rate->save;
        return $rate;

    }
    public function delete($id){
        $this->getRateById($id)->delete();


    }
}
