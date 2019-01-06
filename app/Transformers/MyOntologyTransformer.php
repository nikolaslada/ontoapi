<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Ontology;

final class MyOntologyTransformer extends TransformerAbstract
{
    
	public function transform(Ontology $ontology): array
	{
		return [
			'id' => (int) $ontology->id,
			'name' => $ontology->name,
		];
	}
    
}
