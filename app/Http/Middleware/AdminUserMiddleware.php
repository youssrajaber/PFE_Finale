<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        //  if(!$user)
        //     {
        //     return redirect()->route('loginys');
        //      }



        if ($user->role != User::ADMIN_ROLE) {
            return
                redirect()->route('products');

            // dd($user);
        }

        return $next($request);
    }
}
