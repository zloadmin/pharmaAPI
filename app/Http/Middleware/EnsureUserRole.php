<?php

namespace App\Http\Middleware;

use App\Enums\User\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Response as ResponseCode;

class EnsureUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (auth()->user()->role->value == $role) {
            return $next($request);
        }
        return response()->json(['status' => 'error', 'message' => 'Wrong role'], ResponseCode::HTTP_BAD_REQUEST);
    }
}
