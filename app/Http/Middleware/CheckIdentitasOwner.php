<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckIdentitasOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    // Pada middleware CheckIdentitasOwner
    public function handle($request, Closure $next)
    {
        $userIdentitas = Auth::user()->identitas->id;
        $requestedIdentitas = $request->route('id');

        if ($userIdentitas != $requestedIdentitas) {
            abort(403, 'Unauthorized'); // Tindakan tidak diizinkan
        }

        return $next($request);
    }

}
