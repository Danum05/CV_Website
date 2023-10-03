<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = $request->user();

        // Periksa apakah pengguna memiliki salah satu dari role yang diberikan
        foreach ($roles as $role) {
            if ($user && $user->role === $role) {
                return $next($request);
            }
        }

        return redirect()->back()->with('error', 'Unauthorized. Anda tidak memiliki peran yang diperlukan.');
    }
}
