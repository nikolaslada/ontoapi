<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

final class OntologyRepositoryTest extends TestCase
{
    use RefreshDatabase;
    
    /** @var \App\Repositories\OntologyRepository */
    private $ontologyRepository;
    
    
    protected function setUp(): void {
        parent::setUp();
        $this->ontologyRepository = $this->app->make('App\Repositories\OntologyRepository');
    }
    
    
    /**
     * @test
     *
     * Test: GET /ontology.
     */
    public function testIndex(): void
    {
        $this->seed(\OntologiesTableSeeder::class);
        
        $data = $this->ontologyRepository->getIndex()->all();
        
        $this->assertCount(2, $data);
        $record = $data[0];
        
        $this->assertSame(1, $record->id);
        $this->assertSame('My ontology', $record->name);
        
        $this->assertObjectHasAttribute('userId', $record);
        $this->assertObjectHasAttribute('userName', $record);
    }
}
