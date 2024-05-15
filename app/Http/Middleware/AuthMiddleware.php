<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Kiểm tra vai trò của người dùng
        if (auth()->check() && auth()->user()->role == 2) {
            // Nếu người dùng có vai trò là 2, chuyển hướng về trang người dùng
            return redirect('/');
        }

        return $next($request);
    }
}
