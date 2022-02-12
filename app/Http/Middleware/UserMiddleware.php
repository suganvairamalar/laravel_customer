<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //below code is use to ban email
        /*if(Auth::check() && Auth::user()->is_ban){
            $banned = Auth::user()->is_ban=="1";
            Auth::logout();
            if($banned=='1'){
                $message = "Your account has been Banned. Please contact administrator.";
            }
            return redirect()->route('login')
            ->with('status',$message)
            ->withErrors(['email'=>"Your account has been Banned. Please contact administrator."]);
        }*/

        //below code is use to check online or offline

       /* if(Auth::check() && Auth::user()->role_as)
        {
            $roles = Auth::user()->role_as=="user";
            if($roles=='user'){
            $expiresAt = Carbon::now()->addMinutes(5);
            Cache::put('user_is_online'.Auth::user()->id, true, $expiresAt);
            }
        }*/
        return $next($request);
    }
}
