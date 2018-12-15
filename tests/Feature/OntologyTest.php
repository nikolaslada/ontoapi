<?php
namespace Tests\Feature;

use Tests\TestCase;

class OntologyTest extends TestCase
{
    /**
     * @test
     *
     * Test: GET /ontology.
     */
    public function testIndex(): void
    {
        $result = [
            [
                'id' => 1,
                'name' => 'My ontology',
            ],
            [
                'id' => 2,
                'name' => 'My ontology',
            ],
        ];
        
        $response = $this->get('/ontology');
        $response->assertStatus(200);
        $response->assertJson(
            $result,
            true
        );
    }
}
