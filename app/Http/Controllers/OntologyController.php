<?php

namespace App\Http\Controllers;

use Dingo\Api\Routing;
use Dingo\Api\Http\Response;
use App\Repositories\OntologyRepository;
use App\Transformers\OntologyTransformer;

final class OntologyController extends Controller
{
    
    use Routing\Helpers;
    
    
    /** @var OntologyRepository */
    private $repository;
    
    
    public function __construct(OntologyRepository $repository)
    {
        $this->repository = $repository;
    }
    
    
    public function index(): Response
    {
		return $this->response->collection(
            $this->repository->getIndex(),
            new OntologyTransformer
		);
    }

}
