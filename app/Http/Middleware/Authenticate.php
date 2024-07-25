<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
 /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            # code...
            return redirect('/auth/login')->with('error', 'You do not login.');
        }
        $user = auth()->user();
        if (!$user) {
            # code...
            return redirect('/auth/login')->with('error', 'Veuillez-vous connecter.');
        }
        $role = Role::find($user['role_id']);
        if ($role->nom === 'User') {
            return $next($request);
        }

        return redirect('/auth/login')->with('error', 'You do not login.');
    }
}
