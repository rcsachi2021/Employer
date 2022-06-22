<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ForgotPasswordMail;
use Mail;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function processLogin(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if($request->remember == 1)
        {
            $remember = 1;
        }else{
            $remember = 0;
        }
        $input = ['email' => $request->email,'password' => $request->password];
        if(auth()->guard('employer')->attempt($input,$remember)){
                return redirect()->route('joblist');
        }
        else{
            return redirect()->back()->with('message', 'Invalid Login');
        }
    }

    public function logout()
    {
        auth()->guard('employer')->logout();
        return redirect()->route('login');
    }

    public function forgotpassword()
    {
        return view('employer.forgetpassword');
    }

    public function sendVerification()
    {
        Mail::to('sacheeshrc@gmail.com')->send(new ForgotPasswordMail());
    }
}
