<?php

namespace App\Repositories;

use Illuminate\Database\Connection;
use Illuminate\Support;
use Illuminate\Database\Eloquent;
use App\Ontology;

final class OntologyRepository
{
    
    /** @var Connection */
    private $connection;
    
    
    public function __construct(Connection $connection) {
        $this->connection = $connection;
    }
    
    
    public function getIndex(): Support\Collection
    {
        return $this
            ->connection
            ->table('ontologies')
            ->leftJoin('users', 'ontologies.user_id', '=', 'users.id')
            ->select(
                'ontologies.id',
                'ontologies.name',
                'users.id AS userId',
                'users.name AS userName'
            )
            ->get();
    }
    
    
    public function myOntologies(int $userId): Eloquent\Collection
    {
        return Ontology
            ::where('user_id', '=', $userId)
            ->get([
                'id',
                'name',
            ]);
    }
    
}
