<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Dingo\Api\Auth\Auth;
use Dingo\Api\Auth\Provider\JWT;
use Tymon\JWTAuth\JWTAuth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPolicies();

        app(Auth::class)->extend('jwt', function ($app) {
            return new JWT($app[JWTAuth::class]);
        });
    }
}
