<?php

namespace App\Http\Middleware;

use Closure;

class UserHasStoreMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->store()->count()) { //Barrando acesso de criação de loja para usuario que ja possui
            flash('Você já possui uma loja cadastrada')->warning()->important();
            return redirect()->route('admin.stores.index');
        }
        return $next($request);
    }
}