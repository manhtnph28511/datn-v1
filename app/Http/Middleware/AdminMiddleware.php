<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // app/Http/Middleware/CheckAdmin.php

    public function handle($request, Closure $next)
    {
       
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vui lòng đăng nhập để tiếp tục.');
        }

       
        if (Auth::user()->role !== 1) {
            return redirect()->route('home-client')->with('error', 'Bạn không có quyền truy cập vào trang này.');
        }

      
        return $next($request);
    }


}
