<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;

class AuthenticateTest extends TestCase
{
    /**
     * @test
     *
     * Test: POST /authenticate.
     */
    public function testGetAuthToken(): void
    {
        $password = 'sectedPassword';
        $user = factory(User::class)->create([
            'password' => bcrypt($password),
        ]);
        
        $this
            ->post(
            '/api/authenticate',
            [
                'email' => $user->email,
                'password' => $password,
            ])
            ->assertStatus(200)
            ->assertJsonStructure([
                'token',
            ]);
    }
}
