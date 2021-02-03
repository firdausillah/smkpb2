<?php
namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$akses){
        // dd($akses);
        $check = false;
        if (Auth::check()) {
            if(strtolower(Auth::user()->akses)==strtolower($akses)) $check = true;
            else{
                abort(404);
                return;
            }
        }
        if($check){
            if(Auth::user()->status==1) return $next($request);
            else return redirect()->route('logout');
        }else
            return redirect()->guest('login');
    }
}
