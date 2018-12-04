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
    public function testVersion(): void
    {
        $result = [
            'version' => '0',
        ];
        
        $response = $this->get('/ontoapi/public/version');
        $response->assertStatus(200);
        $response->assertJson(
            $result,
            true
        );
    }

}
