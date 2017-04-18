<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
class AuthController extends Controller
{
    public function getLogin(){
        return view ('auth.login');
    }
    public function getRegister(){
        return view ('auth.register');
    }
    public function postLogin(Request $request){
        $this->validate($request,[
           'name'=>'required|exists:users',
            'password'=>'required'
        ]);

        if(Auth::attempt(['name'=>$request['name'], 'password'=>$request['password']])){
            return redirect()->route('dashboard');
        }else{
            return redirect()->back();
        }
    }
    public function postRegister(Request $request){
        $this->validate($request,[
           'name'=>'required|unique:users',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|confirmed'
        ]);
        $user=new User();
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->password=bcrypt($request['password']);
        $user->save();
        Auth::login($user);
        return redirect()->route('dashboard');
    }
}
