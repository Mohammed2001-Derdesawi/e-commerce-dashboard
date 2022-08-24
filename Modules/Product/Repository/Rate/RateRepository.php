<?php




namespace Modules\Product\Repository\Rate;

use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Auth;
use Modules\Product\Entities\Rate\Rate;
use Modules\Product\Filters\Rate\Search;
use Modules\Product\Repository\Actions\ActionUserInterface;
use Modules\Product\Repository\Product\ProductRepositoryInterface;

class RateRepository implements ActionUserInterface{

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
        $user=$this->getUser();
        $rate=$user->rate($id,$value);
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