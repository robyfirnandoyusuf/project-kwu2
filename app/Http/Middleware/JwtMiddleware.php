<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'data' => 'Token is invalid !',
                ], Response::HTTP_UNAUTHORIZED, [], JSON_PRETTY_PRINT);
            }

        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json([
                    'success' => false,
                    'data' => 'Token is invalid !',
                ], Response::HTTP_UNAUTHORIZED, [], JSON_PRETTY_PRINT);

            } elseif ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {    
                return response()->json([
                    'success' => false,
                    'data' => 'Token is expired !',
                ], Response::HTTP_UNAUTHORIZED);
            } else {
                return response()->json([
                    'success' => false,
                    'data' => 'Token is expired !',
                ], Response::HTTP_UNAUTHORIZED, [], JSON_PRETTY_PRINT);
            }
        }

        return $next($request);
    }
}
