<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard){
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('administrator.dashboard');
                }
                break;
            default:
                if(Auth::check() && Auth::user()->status == 'aktif' && Auth::user()->level_user =="manajer"){
                    // return 'a';
                    // Auth::logout();
                    // return "berhasil";
                    return redirect()->route('manajer.dashboard');
                    // return redirect('/staf_tu/dashboard');

                }
                elseif(Auth::check() && Auth::user()->status == 'aktif' && Auth::user()->level_user =="operator"){
                    // Auth::logout();
                    return redirect()->route('operator.dashboard');
                }
                elseif(Auth::check() && Auth::user()->status == 'tdk_aktif' && Auth::user()->level_user =="manajer"){
                    Auth::logout();
                    // return "gagal";
                    return redirect()->route('login')->with(['error'    =>  'Akun Anda Sudah Tidak Aktif !!']);
                    // return redirect('/staf_tu/dashboard');
                }
                elseif(Auth::check() && Auth::user()->status == 'tdk_aktif' && Auth::user()->level_user =="operator"){
                    Auth::logout();
                    // return redirect('/pimpinan/dashboard');
                    return redirect()->route('login')->with(['error'    =>  'Akun Anda Sudah Tidak Aktif !!']);

                }
                else{
                    Auth::logout();
                }
                break;
        }

        return $next($request);
    }
}
