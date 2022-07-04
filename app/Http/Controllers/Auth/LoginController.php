<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {   
        $input = $request->all();
  
        $validator = $this->validate($request, [
            'email' => 'required',
            'password' => 'required|digits:8',
        ]);
  
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'nik';
        if(auth()->attempt(array($fieldType => $input['email'], 'password' => $input['password'])))
        {
            return redirect()->route('home');
        }else{
            return redirect()->route('login')->withErrors($validator);
        }
          
    }

    public function logout(Request $request)
    {
        $this->guard('web')->logout();

        // $request->session()->invalidate();

        return redirect()->route('login');
    }
}
