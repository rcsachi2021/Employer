<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\carbon;

class ForgetPasswordController extends Controller
{
    public function getEmail()
    {
        return view('auth.forgetpassword.resetpassword');
    }

    public function postEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:employers'
        ]);
        
        $token = Str::random(64);
        echo $token;
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('email.passwordreset-veryfy', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password Notification');
        });

        return redirect()->back()->with('message', 'We have sent your password reset link');
    }
}
