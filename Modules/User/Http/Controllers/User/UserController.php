<?php

namespace Modules\User\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Modules\User\Emails\sendForgetPasswordUser;
use Modules\User\Http\Requests\User\LoginUserRequest;
use Modules\User\Http\Requests\User\RegisterUserRequest;

class UserController extends Controller
{
    public function register(RegisterUserRequest $request) {
        $user = User::create([
            'name' => 'samer',
            'email' => 'samer..123.@gmail.com',
            'password' => 'password',
        ]);
        dd('registered');
    }


    public function login (LoginUserRequest $request) {
        Auth::login(User::find(3));
//        if (Auth::attempt(['password'=>$request->password,'email'=>$request->email])) {
//            dd('logged');
//        }
       dd(Auth::user());
//        return redirect()->route('admin.showloginform')->withInput(['email'=>$request->email])->with('faild',' Password is incorrect');
    }


    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        dd('logged out');
    }


    public function checkEmailForgetPassword(Request $request){
        $validate = $request->validate([
            'email' => 'required|email|exists:admins,email'
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        $email = $request->email;
        $data = array(
            'token' => $token,
            'email' => $email,
        );

        Mail::to('testmailderdesawi@gmail.com')->send(new sendForgetPasswordUser($data));
//        return back()->with('message', 'We have e-mailed your password reset link!');
    }
}
