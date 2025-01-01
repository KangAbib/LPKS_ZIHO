<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::guard('siswa')->user();

        if (!$user || $user->role !== 'siswa') {
            return redirect('/'); // Atau halaman yang diinginkan jika akses ditolak
        }

        return $next($request);
    }
}
