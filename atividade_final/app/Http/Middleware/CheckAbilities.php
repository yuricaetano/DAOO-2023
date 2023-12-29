<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAbilities
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  ...$abilities
     * @return mixed
     */
    public function handle($request, Closure $next, ...$abilities)
    {
        $user = Auth::user();

        foreach ($abilities as $ability) {
            if (!$user->hasAbility($ability)) {
                return response()->json(['error' => 'Acesso não autorizado.'], 403);
            }
        }

        return $next($request);
    }
}
