<?php

namespace App\Http\Controllers;

use Dingo\Api\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpKernel\Exception;

final class AuthenticateController extends Controller
{
    /** @var JWTAuth */
    private $auth;
    
    
    public function __construct(JWTAuth $auth) {
      $this->auth = $auth;
    }
    
    
    public function login(Request $request): array
    {
        try {
            $credentials = $request->only([
                'email',
                'password',
            ]);
            
            $token = $this->auth->attempt($credentials);  
            
            if($token === false) {
                throw new Exception\AccessDeniedHttpException();
            }
            
            return [
                'token' => $token,
            ];
        } catch (JWTException $e) {
            throw new Exception\HttpException(500);
        }
    }
    
    
}
