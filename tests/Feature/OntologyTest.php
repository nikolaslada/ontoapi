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
        $this->seed(\OntologiesTableSeeder::class);
        
        $response = $this->get('/ontology');
        $response->assertStatus(200);
        
        $result = $response->decodeResponseJson();
        
        $this->assertCount(1, $result);
        $this->assertArrayHasKey('data', $result);
        
        $data = $result['data'];
        
        $this->assertCount(2, $data);
        $this->assertSame(1, $data[0]['id']);
        $this->assertSame('My ontology', $data[0]['name']);
        
        $this->assertArrayHasKey('user', $data[0]);
        $this->assertArrayHasKey('id', $data[0]['user']);
        $this->assertArrayHasKey('name', $data[0]['user']);
    }
}
