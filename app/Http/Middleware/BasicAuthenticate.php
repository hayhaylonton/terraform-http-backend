<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Auth;


class BasicAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        //if (config('baseauth.users')->contains([$request->getUser(), $request->getPassword()])) {
        Log::info($request->getUser());
        if(Auth::attemptWhen([
            'email' => $request->getUser(),
            'password' => $request->getPassword(),
        ])){
            return $next($request);
        }

        return response('You shall not pass!', 401, ['WWW-Authenticate' => 'Basic']);
    }
}
