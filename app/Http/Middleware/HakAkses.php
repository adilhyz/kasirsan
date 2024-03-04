<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HakAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (!auth()->check() && auth()->user('level' === 'Admin') || auth()->user('level' === 'Petugas')) {
        //     abort(403);
        // }
        if (!auth()->check() && auth()->user()->level === 'Admin' || auth()->user()->level === 'Petugas') {
            abort(403);
        }
        return $next($request);
        // session(auth()->check() && auth()->user()->level === 'Petugas');//tes
        // return redirect()->route('/')->with('notadmin', 'Anda tidak memiliki izin untuk mengakses halaman registrasi.');
    }
}
