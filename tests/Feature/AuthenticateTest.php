<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticateTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     *
     * Test: POST /login.
     */
    public function testLogin(): void
    {
        $this->refreshDatabase();
        $this->seed(\UsersTableSeeder::class);
        $response = $this->post('/login', [
            'email' => 'test@test.loc',
            'password' => 'secret',
        ]);
        
        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'token',
            ]);
    }
}
