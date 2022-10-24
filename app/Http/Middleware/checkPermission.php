<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (($request->user()->role == 1 && $request->user()->status == 1) || ($request->user()->role == 2 && $request->user()->status == 1)) {
            return $next($request);
        } else {
            Auth::logout();
            return redirect()->route('login1')->with('msg', 'Tài khoản của bạn không có quyền đăng nhập');
        }
    }
}
