<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Repositories\OntologyRepository;

final class OntologyRepositoryTest extends TestCase
{
    /** @var OntologyRepository */
    private $ontologyRepository;
    
    
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
        \exec('php artisan migrate:refresh --env=testing');
    }
    
    
    protected function setUp(): void {
        parent::setUp();
        $this->ontologyRepository = $this->app->make('App\Repositories\OntologyRepository');
    }
    
    
    /**
     * @test
     */
    public function testIndex(): int
    {
        $this->seed(\OntologiesTableSeeder::class);
        $data = $this->ontologyRepository->getIndex()->all();
        
        $this->assertGreaterThanOrEqual(2, count($data));
        $record = $data[0];
        
        $this->assertObjectHasAttribute('id', $record);
        $this->assertObjectHasAttribute('name', $record);
        $this->assertObjectHasAttribute('userId', $record);
        $this->assertObjectHasAttribute('userName', $record);
        
        return $record->userId;
    }
    
    
    /**
     * @test
     * @depends testIndex
     */
    public function testMyOntologies(int $userId): void
    {
        $data = $this->ontologyRepository->myOntologies($userId)->all();
        
        $this->assertGreaterThanOrEqual(2, $data);
        
        $ontology = $data[0];
        /* @var $ontology \App\Ontology */
        $record = $ontology->getAttributes();
        
        $this->assertArrayHasKey('id', $record);
        $this->assertArrayHasKey('name', $record);
    }
    
}
