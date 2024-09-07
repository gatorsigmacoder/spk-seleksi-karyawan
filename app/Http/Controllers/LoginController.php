<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        if(Auth::check()){
            $user = Auth::user();
            if($user->hasVerifiedEmail()){
                if($user->is_admin == true){
                    return redirect()->intended('/dashboard-admin');
                }else{
                    return redirect()->intended('/dashboard-pelamar');
                }
            }
            return redirect()->route('verification.notice');
        }else{
            return view('login.index', [
                'title' => 'Login',
                'active' => 'Login'
            ]); 
        }
    }

    public function authentication(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if(auth()->user()->is_admin == true){
                return redirect()->intended('/dashboard-admin');
            }else{
                return redirect()->intended('/dashboard-pelamar');
            }
        }

        return back()->with('loginError', 'Login gagal!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        var_dump($request); die;
    
        return redirect('/');
    }
}
