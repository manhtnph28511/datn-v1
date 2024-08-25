<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     if (Auth::check() && Auth::user()->role !== 1) {
    //         return $next($request);
    //     }

    //     // Redirect người dùng admin hoặc chưa đăng nhập đến trang lỗi
    //     return redirect()->route('home-client')->with('error', 'Bạn không có quyền truy cập vào trang này.');
    
    // }
    // public function handle($request, Closure $next): Response
    // {
    //     if (Auth::check() && Auth::user()->role === 0) {
    //         return $next($request);
    //     }

    //     return redirect()->route('admin')->with('error', 'Bạn không có quyền truy cập vào trang của người dùng.');
    // }
}
