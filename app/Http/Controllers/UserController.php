<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getLogout(){
        Auth::logout();
        echo "logout";
    }
    public function getHome(){
        return view ('home');
    }
}
