<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function reg()
    {
        return view('login.reg');
    }
    public function login()
    {
        return view('login.login');
    }
}
