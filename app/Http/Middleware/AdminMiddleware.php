<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    //admin
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 1) {
            return redirect('admin/dashboard');
        }
    }
}
