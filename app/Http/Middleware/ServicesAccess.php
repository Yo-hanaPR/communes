<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Token;
use Symfony\Component\HttpFoundation\Response;

class ServicesAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('Authorization');
        $tokenData = Token::where('token', $token)->first();
        
        if ($tokenData && now() < $tokenData->expiration) {
            return $next($request);
        }
        return response()->json(['error' => 'Token inválido o expirado'], 401);
    }
}
