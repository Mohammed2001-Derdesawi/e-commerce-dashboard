<?php

namespace Modules\User\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Entities\Admin\Admin;
use Illuminate\Contracts\Support\Renderable;

class UserResetPasswordController extends Controller
{


    public function updatePassword (Request $request) {
        $validate = $request->validate([
            'password' => 'required|min:8|max:15',
            'confirm_password' => 'required',
        ]);

        $token = $request->token;

        $check = DB::table('password_resets')->where('token' , $token)->first();
        if(!$check) {
            return back()->with('error' , 'Invalid Token!');
        }

        $checkEmail = $check->email;
        $user = User::where('email' , $checkEmail)->update([
            'password' => Hash::make($request->password),
        ]);

        DB::table('password_resets')->where(['email'=> $checkEmail])->delete();

//        return redirect()->route('admin.showloginform')->with('message', 'Your password has been changed!');


    }
}
