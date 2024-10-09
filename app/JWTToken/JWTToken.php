<?php

namespace App\JWTToken;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;

class JWTToken
{
    public static function CreateToken($userEmail, $userID):string{
        $key = env('JWT_Key');
        $payload = [
            'iss' => 'laravel-token',
            'iat' => time(),
            'exp' => time() + 60 * 60,
            'userEmail' => $userEmail,
            'userID' => $userID
        ];
        return JWT::encode($payload, $key, 'HS256');
    }
    public static function VerifyToken($token):string | object
    {
        try{
            if ($token==null)
            {
                return 'Unauthorized';
            }
            else
            {
                $key = env('JWT_Key');
                $decode =  JWT::decode($token, new Key($key, 'HS256'));
                return $decode;
            }
        }catch(ExpiredException|Exception){
            return 'Unauthorised';
        }

    }

    public static function VerifyEmailToken($userEmail):string{
        $key = env('JWT_Key');
        $payload = [
            'iss' => 'laravel-token',
            'iat' => time(),
            'exp' => time() + 60 * 5,
            'userEmail' => $userEmail,
            'userID' => '0'
        ];
        return JWT::encode($payload, $key, 'HS256');
    }
}
