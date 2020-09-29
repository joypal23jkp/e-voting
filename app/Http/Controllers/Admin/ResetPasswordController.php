<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{


    use ResetsPasswords;

    public function reset(){
        return view('admin.auth.passwords.reset');
    }
    protected $redirectTo = '\admin';
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
