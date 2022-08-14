<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;



class isAdminBank
{
    public function handle(Request $request, Closure $next)
    {
        if(!session('dataUser')){
            return redirect()->route('login');
        }
        
        if( session('dataUser')->role != 'admin-bank'){
            return redirect()->route('login');
        }
        return $next($request);
    }
}
