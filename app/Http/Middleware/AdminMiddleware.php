<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next) {
        if ((($request->user()->role == 'Administrador') && ($request->user()->role == 'Almacenista')) || ($request->user()->role == 'Administrador')) {
            return $next($request);
        }
        return back()->with('error', 'No eres Administrador no tienes privilegios para acceder');
    }
}
