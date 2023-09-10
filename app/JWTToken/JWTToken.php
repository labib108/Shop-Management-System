<?php

namespace App\JWTToken;
use Firebase\JWT\JWT;

class JWTToken
{
    public static function CreateToken($userEmail){
        $key = env('JWT_Key');
        $payload = [
            'iss' => 'laravel-token',
            'ist' => time(),
            'exp' => time() + 60 * 60,
            'userEmail' => $userEmail
        ];
        $jwt = JWT::encode($payload, $key, 'HS256');
        return $jwt;


    }
    public static function VerifyToken($token):string{
        try{
            $key = env('JWT_Key');
            $decode =  JWT::decode($token, new Key($key, 'HS256'));
            return $decode->userEmail;
        }catch(Exception $e){
            return 'Unauthorized';
        }

    }

}
