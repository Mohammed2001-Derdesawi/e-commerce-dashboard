<?php




namespace Modules\Product\Repository\Rate;

use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Auth;
use Modules\Product\Entities\Rate\Rate;
use Modules\Product\Filters\Rate\Search;
use Modules\Product\Repository\Actions\ActionUserInterface;
use Modules\Product\Repository\Product\ProductRepositoryInterface;

<<<<<<< HEAD
class RateRepository implements RateInterface{
   
=======
class RateRepository implements ActionUserInterface{

>>>>>>> 10bdf55e56e5d580f8b241021bdf87d286193de8
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

    public function createorupdate($id, $value) // $id for entity id
    {
<<<<<<< HEAD
        $product = $this->prodRepo->getByID($product);
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
=======
        $user=$this->getUser();
        $rate=$user->rate($id,$value);
>>>>>>> 10bdf55e56e5d580f8b241021bdf87d286193de8
        return $rate;

    }
    public function delete($id){    // $id for rate id
        $user=$this->getUser();
         $user->unrate($id)->delete();


    }
    public function getUser()
    {
        return Auth::user();
    }
    public function  admindelete($id)
    {
        $rate=findById($id,new Rate,[]);
        $rate->delete();
        return;

    }
}

