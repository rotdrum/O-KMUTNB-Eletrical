<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginAdmin extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showLogin()
    {
        return view('adminlogin');
    }

    public function doLogin(Request $request)
    {
        
        $username = $request->input('username');
        $password = $request->input('password');
        
            if($username=='sss' && $password=='ssss'){
            return view('adminhome');
            } 
            else {
                return view('adminlogin');
            }

    }


}
