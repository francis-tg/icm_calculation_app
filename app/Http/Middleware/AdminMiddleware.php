<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if (!$user) {
            # code...
            return redirect('/login')->with('error', 'You do not have admin access.');
        }
        $role = Role::find($user['role_id']);
        if (auth()->check() && $role->nom === 'Admin') {
            return $next($request);
        }

        return redirect('/login')->with('error', 'You do not have admin access.');
    }
}
