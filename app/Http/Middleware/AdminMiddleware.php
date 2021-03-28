<?php

namespace App\Http\Middleware;

use App\Models\RefRole;
use Closure;
use Illuminate\Http\Request;
use Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $role = RefRole::where('ref', 1)->first();
        if (!Auth::guest()) 
            if (Auth::user()->role != $role->id)
                return redirect()->route('admin.auth.get')->with('error_msg', 'Anda tidak berhak mengakses !');
        if (Auth::guest())
            return redirect()->route('admin.auth.get')->with('error_msg', 'Anda tidak berhak mengakses !');
                
        return $next($request);
    }
}
