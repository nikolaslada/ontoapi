<?php

namespace App\Repositories;

use Illuminate\Database\Connection;
use Illuminate\Support\Collection;

final class OntologyRepository
{
    
    /** @var Connection */
    private $connection;
    
    
    public function __construct(Connection $connection) {
        $this->connection = $connection;
    }
    
    
    public function getIndex(): Collection
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
    
}
