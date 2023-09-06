<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $admin = auth('admin')->user();

        if ($admin && in_array($admin->role->name, $roles)) {
            return $next($request);
        }

        // abort(403, 'Unauthorized');
        return redirect()->route('admin.dashboard')->with('warning', 'Unauthorized access');
    }
}
