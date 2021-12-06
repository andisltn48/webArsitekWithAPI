<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Roles;

use Illuminate\Support\Facades\Auth;
class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        foreach ($roles as $key => $value) {
            if (session('role') == $value) {    
                // dd($role->name);
                return $next($request);
            }
        }
        
        return response()->json([
            'message' => 'Anda tidak memiliki hak ases',
            'role' => session('role'),
        ]);
        //  return redirect('/')->with('error',"Anda tidak dapat mengakses halaman ini");
    }
}
