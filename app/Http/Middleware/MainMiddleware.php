<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MainMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = session('role');

        if($role === 'admin' ){
            return redirect()->route('admin_index');
        }elseif ($role === 'dealer' ){
            return redirect()->route('dealer_index');
        }elseif ($role === 'seller' ){
            return redirect()->route('seller_index');
        }elseif ($role === 'buyer' ){
            return redirect()->route('buyer_index');
        }
        return $next($request);
    }
}
