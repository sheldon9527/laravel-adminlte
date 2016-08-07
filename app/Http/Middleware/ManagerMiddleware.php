<?php

namespace App\Http\Middleware;

use Closure;

class ManagerMiddleware
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

        if($request->path() == 'manager'){
            
            return redirect(route('admin.dashboard'));
        }

        return $next($request);
    }
}
