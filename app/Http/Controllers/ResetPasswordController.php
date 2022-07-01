<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Employer;

class ResetPasswordController extends Controller
{
    public function getPassword($token)
    {
        return view('auth.forgetpassword.passwordreset', ['token'=>$token]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:employers',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $updatePassword = DB::table('password_resets')->where(['email' => $request->email,'token'=>$request->token])->first();
        if(!$updatePassword)
        {
            return redirect()->back()->with('message', 'Invalid Token!');

        }

        $employer = Employer::where(['email'=>$request->email])->update(['password'=>Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=>$request->email])->delete();
        return redirect()->back()->with('message', 'Password rest sucessfully');

    }
}
