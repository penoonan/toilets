<?php

namespace Toilets\Http\Middleware;

use Closure;

// only the user can view their own stuff
// well ... and admins ...
class AuthenticatePrivate
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
        if (!auth()->check()) {
            return redirect()->route('auth.login');
        }

        if (auth()->user()->slug !== $request->user && !auth()->user()->isAdmin()) {
            return back()->withErrors(['You do not have permission to view this profile']);
        }

        return $next($request);
    }
}
