<?php

namespace Modules\Admin\Http\Controllers\Authentication;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Support\Renderable;
use Modules\Admin\Emails\SendForgetPasswordAdmin;
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



    public function forgetPassword(){
        return view('admin::Admin.auth.forgetPassword');
    }


    public function checkEmailForgetPassword(Request $request){
        $validate = $request->validate([
            'email' => 'required|email|exists:admins,email'
        ]);

        $token = Str::random(64);
        //  $token = app()->token();
        //  dd($token);

        DB::table('password_resets_admin')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        $email = $request->email;
        $data = array(
            'token' => $token,
            'email' => $email,
        );

        // dispatch(new ResetPasswordJob($data));
        // ResetPasswordJob::dispatch($data);
        Mail::to('testmailderdesawi@gmail.com')->send(new SendForgetPasswordAdmin($data));
        return back()->with('message', 'We have e-mailed your password reset link!');
    }
}
