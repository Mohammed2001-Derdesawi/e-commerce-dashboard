<?php

namespace Modules\Admin\Http\Controllers\Authentication;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Entities\Admin\Admin;
use Illuminate\Contracts\Support\Renderable;

class ResetPasswordController extends Controller
{
    public function showResetPassword ($token) {
        
        $updatePassword = DB::table('password_resets_admin')->where([
            'token' => $token,
        ])->first();

        if (!$updatePassword) {
            return abort(404);
        }

        $date = $updatePassword->created_at;
        $now = Carbon::now();
        
        if($now->diffInMinutes($date) < 5) {
            return view('admin::Admin.auth.resetPassword' , compact('token'));
        }

        DB::table('password_resets_admin')->where([
            'email' => $updatePassword->email,

        ])->delete();
        return abort(404);
        
        
    }


    public function updatePassword (Request $request) {
        $validate = $request->validate([
            'password' => 'required|min:8|max:15',
            'confirm_password' => 'required',
        ]);

        $token = $request->token;

        $check = DB::table('password_resets_admin')->where('token' , $token)->first();
        if(!$check) {
            return back()->with('error' , 'Invalid Token!');
        }

        $checkEmail = $check->email;
        $admin = Admin::where('email' , $checkEmail)->update([
            'password' => Hash::make($request->password),
        ]);

        DB::table('password_resets_admin')->where(['email'=> $checkEmail])->delete();
 
        return redirect()->route('admin.showloginform')->with('message', 'Your password has been changed!');

        
    }
}
