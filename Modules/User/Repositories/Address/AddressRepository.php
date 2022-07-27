<?php

namespace Modules\User\Repositories\Address;

use Illuminate\Support\Facades\Auth;
use Modules\User\Repositories\Address\AddressInterface;

class AddressRepository implements AddressInterface
{

    protected $user ;
    public function __construct()
    {
        $this->user = Auth::user();
    }
    public function index()
    {
        return $this->user->addresses();
    }

    public function create($request)
    {
        $address = $this->user->addresses()->create([
            'street1'=>$request->street1,
            'city'=>$request->city,
            'state'=>$request->state,
            'zip'=>$request->zip,
            'country'=>$request->country,
            'phone'=>$request->phone,
        ]);
        return $address;
    }

    public function update($request,$id)
    {
        $address = $this->user->addresses()->findOrFail($id);
        $address->update([
            'street1'=>$request->street1,
            'city'=>$request->city,
            'state'=>$request->state,
            'zip'=>$request->zip,
            'country'=>$request->country,
            'phone'=>$request->phone,
        ]);
        $address->save();
        return $address;
    }

    public function delete($id)
    {
        $address = $this->user->addresses()->findOrFail($id);
        $address->delete();
        return;
    }

    
}
