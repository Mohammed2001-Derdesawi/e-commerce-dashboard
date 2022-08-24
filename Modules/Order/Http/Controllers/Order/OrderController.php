<?php

namespace Modules\Order\Http\Controllers\Order;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Order\Entities\Order\Order;
use Illuminate\Contracts\Support\Renderable;
use Modules\Order\Repositories\Order\OrderInterface;
use Modules\Order\Transformers\Shipment\RateShippmentResource;

class OrderController extends Controller
{

    private $orderRepo;

    public function __construct(OrderInterface $orderInterface)
    {
        $this->orderRepo=$orderInterface;

    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('order::order.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('order::create');
    }


    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {

        $order=$this->orderRepo->findOrderById($id,
        ['user:id,email,name','ordersdetails.product:id,name,sku'],
        ['id','created_at','updated_at','user_id','status']


    );
        return view('order::order.show',compact('order'));
    }

    public function track()
    {
        $this->orderRepo->track(1);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('order::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }





}
