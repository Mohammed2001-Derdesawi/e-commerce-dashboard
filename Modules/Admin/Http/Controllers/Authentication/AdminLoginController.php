<?php

namespace Modules\Admin\Http\Controllers\Authentication;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Http\Requests\Authentication\AdminLoginRequest;

class AdminLoginController extends Controller
{

    public function showloginForm()
    {
        return view('admin::Admin.auth.login');
    }

    public function login(AdminLoginRequest $request){
        if(Auth::guard('admin')->attempt(['password'=>$request->password,'email'=>$request->email]))
         {
            auth()->guard('admin')->user()->last_login_at=now();
            return redirect()->intended(route('admin.dashboard'));
         }
         return redirect()->route('admin.showloginform')->withInput(['email'=>$request->email])->with('faild',' Password is incorrect');



    }

    public function logout(Request $request){
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect()->route('admin.showloginform');
    }
}
