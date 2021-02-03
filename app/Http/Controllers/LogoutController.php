<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

// use Auth;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller{
    function __invoke()
    {
    	if(Auth::check()){
    		Auth::logout();
    	}
    	return redirect('/');
    }
}
