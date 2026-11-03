<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Comprobar si el usuario está autenticado y su columna Mota es 'Admin'
        if (auth()->check() && auth()->user()->Mota === 'Admin') {
            return $next($request);
        }

        abort(403, 'Baimenik ez. Gune hau administratzaileentzat bakarrik da.');
    }
}