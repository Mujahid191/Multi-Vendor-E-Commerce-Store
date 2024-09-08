<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if (Auth::check() && Auth::user()->last_active_at < now()->subSeconds(30)) {
            User::find(Auth::user()->id)->update(['last_active_at' => now()]);
        }
    
        if($request->user()->role !== $role){
            return redirect()->back();
        }
    
        return $next($request);
    }    
}
