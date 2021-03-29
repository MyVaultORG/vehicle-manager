<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebController extends Controller
{
    public function __construct()
    {
        $this->middleware("user.logged");
    }
    
    public function login()
    {        
        return view("auth.login");
    }
    
    public function register()
    {
        return view("auth.register");
    }
}
