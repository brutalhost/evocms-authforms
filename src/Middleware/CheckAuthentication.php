<?php

namespace EvolutionCMS\Authforms\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class CheckAuthentication
{
    public function handle(Request $request, Closure $next)
    {
        if (app('evouser')->do('user', ['web'])) {
            $referer = $request->header('referer');
            $baseUrl = URL::to('/');

            if ($referer && strpos($referer, $baseUrl) !== false) {
                return redirect($referer);
            } else {
                return redirect(config('authforms.redirect_if_auth_to', '/'));
            }
//            return redirect(config('authforms.redirect_if_auth_to', '/'));
        }

        return $next($request);
    }
}
