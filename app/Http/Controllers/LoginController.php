<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    protected function guard()
    {
        return Auth::guard('auth');
    }

    protected $redirectTo = '/home';

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    public function showLoginForm()
    {
        return view('login');
    }
}
