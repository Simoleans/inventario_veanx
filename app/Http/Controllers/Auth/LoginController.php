<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        
	  /*----------- LOGIN MANUAL , MODIFICABLE ----------*/
    //dd($request->all());
      if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){

      	return redirect()->intended('dashboard');

      }else{
      	return redirect()->route('login')->withErrors('¡Error! , Revise sus credenciales');
      }

    }

    public function logout()
    {
    	Auth::logout();

    	return redirect()->route('login');
    }
}
