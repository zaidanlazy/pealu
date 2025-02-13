<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class role
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request):
     * (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allow = array_slice(func_get_args(), 2); //cek role yg boleh

        if(\Auth::user()) //jika user login
        {
            $ada = \Auth::user()->hasRole()->value('roles');
            if($ada){
                $roles= $ada;
            }else{
                $roles= 'user';
            }

            foreach($allow as $allow){ //untuk setiap role yg boleh
                if( $roles == $allow){
                    return $next($request);
                }
            }
            return redirect('/dashboard');
        }else{
            return redirect('.');
        }

    }
}
