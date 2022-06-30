<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;

class EmployerController extends Controller
{
    public function signUp()
    {
        return view('employer.signup');
    }

    public function saveEmployer(Request $request)
    {
        $validate = $request->validate([
            'firstname'    => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:employers',
            'password' => 'required|min:6|max:10',
            'mobile'   => 'required|numeric|digits:10|unique:employers',
            'emirates' => 'required',
            
       ]);

       $employer = Employer::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'mobile' => $request-> mobile,
            'emirates' => $request->emirates,
       ]);

       if($employer)
       {
            return redirect()->route('login')->with('message', 'Employer registration successfull');
       }
    }
}
