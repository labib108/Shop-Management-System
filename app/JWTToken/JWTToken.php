<?php

namespace App\JWTToken;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\ExpiredException;

class JWTToken
{
    public static function CreateToken($userEmail):string{
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
        }catch(ExpiredException  $e){
            return 'Unauthorised';
        }catch (\Exception $e){
            return 'Unauthorised';
        }

    }

    public static function VerifyEmailToken($userEmail):string{
        $key = env('JWT_Key');
        $payload = [
            'iss' => 'laravel-token',
            'ist' => time(),
            'exp' => time() + 60 * 5,
            'userEmail' => $userEmail
        ];
        $jwt = JWT::encode($payload, $key, 'HS256');
        return $jwt;


    }

}
