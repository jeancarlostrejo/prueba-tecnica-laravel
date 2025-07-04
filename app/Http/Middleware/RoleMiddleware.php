<?php

namespace App\Http\Middleware;

use App\enums\Rol;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if(Auth::user()->role !== $role) {
            return response()->json([
                'message' => 'Unauthorized access',
            ], 403);
        }

        return $next($request);
    }
}
