<?php

namespace Modules\Order\Repositories\Order;

use Illuminate\Pipeline\Pipeline as PipelinePipeline;
use Modules\Order\Entities\Order\Order;
use Modules\Order\Filters\Order\Search;
use Modules\Order\Filters\Order\Status;
use Modules\Order\Repositories\Order\OrderInterface;

class OrderRepository implements OrderInterface
{

    public function findOrderById($order, $relations = [], $params = ['*'])
    {
        return Order::with($relations)->select($params)->findOrFail($order);
    }

    public function getOrders($paginate = 15, $relations = [], $params=['*'])
    {
        return app(PipelinePipeline::class)
        ->send(Order::query())
        ->through([
            Search::class,
            Status::class,

        ])
        ->thenReturn()
        ->select($params)
        ->with($relations)
        ->paginate($paginate);



    }

    public function create($request)
    {
        
    }
    public function delete($id)
    {
        
    }
    public function update($request,$id){
        
    }

}
