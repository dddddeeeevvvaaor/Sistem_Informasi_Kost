<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;

class CustomerMiddleware
{
     /**
     * The Guard implementation
     * 
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     * 
     * @param Guard $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($this->auth->getUser()->role !== "customer") {
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
