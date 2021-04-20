<?php

namespace App\Http\Middleware;

use App\ApiCodes;
use Closure;
use Illuminate\Http\Request;
use App\Traits\APITrait;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    use APITrait;
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
                $this->success = false;
                $this->code = ApiCodes::TOKEN_INVALID;
                $this->data = 'Token is invalid !';

                return $this->json();
            }

        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                $this->success = false;
                $this->code = ApiCodes::TOKEN_INVALID;
                $this->data = 'Token is invalid !';

                return $this->json();

            } elseif ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                $this->code = ApiCodes::TOKEN_EXPIRED;
                $this->data = 'Token is expired !';
                
                return $this->json();
            } else {
                $this->code = ApiCodes::TOKEN_NOT_FOUND;
                $this->data = 'Token is expired !';
                
                return $this->json();
            }
        }

        return $next($request);
    }
}
