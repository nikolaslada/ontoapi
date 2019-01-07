<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dingo\Api\Routing;
use Dingo\Api\Http\Response;
use App\Repositories\OntologyRepository;
use App\Transformers\MyOntologyTransformer;

final class MyOntologyController extends Controller
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
        $id = $this->auth->getUser(true)->getAuthIdentifier();
		return $this->response->collection(
            $this->repository->myOntologies($id),
            new MyOntologyTransformer
		);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
