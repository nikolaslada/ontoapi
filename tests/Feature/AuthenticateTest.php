<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthenticateTest extends TestCase
{
    /** @var \Illuminate\Database\Connection */
    private $connection;
    
    
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        \exec('php artisan migrate:refresh --env=testing');
    }
    
    
    protected function setUp(): void {
        parent::setUp();
        $this->connection = $this->app->make('Illuminate\Database\Connection');
    }
    
    
    /**
     * @test
     *
     * Test: POST /login.
     */
    public function testLogin(): void
    {
        $this->seed(\UsersTableSeeder::class);
        $user = $this
            ->connection
            ->table('users')
            ->first();
        
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'secret',
        ]);
        
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'token',
            ]);
    }
}
