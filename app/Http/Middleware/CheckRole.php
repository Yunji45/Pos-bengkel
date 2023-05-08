<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $roles = array_slice(func_get_args(),2);
        foreach ($roles as $role){
            if ($request->user()->role == $role){
                return $next($request);
            }    
        }
        return redirect('/dashboard')->with('forbidden', 'Anda Tidak Memiliki Akses');
    }
}
