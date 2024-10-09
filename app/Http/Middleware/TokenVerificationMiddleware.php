<?php

namespace App\Http\Middleware;

use App\JWTToken\JWTToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenVerificationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->cookie('token'); // Get the token from the request header
        $result = JWTToken::VerifyToken($token); // Verify the token
        if ($result == 'Unauthorized') {
            return redirect('/userLogin');
        }
        else {
            $request->headers->set('email',$result->userEmail); // Set the email in the request header
            $request->headers->set('id',$result->userID); // Set the id in the request header
            return $next($request);
        }
    }
}
