<?php

namespace Tests\Feature;

use Tests\TestCase;

class VersionTest extends TestCase
{
    /**
     * @test
     *
     * Test: GET /version.
     */
    public function testIndex(): void
    {
        $result = [
            'version' => '0',
        ];
        
        $response = $this->get('/version');
        $response->assertStatus(200);
        $response->assertJson(
            $result,
            true
        );
    }

}
