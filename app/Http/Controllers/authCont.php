<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class authCont extends Controller
{
    public function viewLogin(){
        return view('authentication.login');
    }

    public function login(Request $req){
        if(Auth::attempt($req->only('email', 'password'))){
            if(Auth::user()->user_type == 'buyer'){
                return redirect('/');
            }else{
                return redirect('/login');
            }
        }else{
            return Redirect()->back()->with('loginFailed', 'Login gagal, email atau password salah!');
        }        
    }

    public function logout(){
        Auth::logout();
        return Redirect('/');
    }

    public function register(){
        return view('authentication.register');
    }

    public function postRegister(Request $req){
        $this->validate($req, [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => bcrypt($req->password),
            'user_type' => 'buyer'
        ]);

        return redirect('/login')->with('regSuccess', 'Pendaftaran telah berhasil. Silahkan login!');
    }
}
