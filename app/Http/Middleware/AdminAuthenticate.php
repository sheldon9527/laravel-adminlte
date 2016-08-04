<?php

namespace App\Http\Middleware;

use Closure;

class AdminAuthenticate
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param Guard $auth
     */
    public function __construct()
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = app('admin')->user();

        if (!$user) {
            session(['url.intended' => \Request::fullUrl()]);

            return redirect(route('admin.auth.login.get'));
        }

        return $next($request);
    }
}
