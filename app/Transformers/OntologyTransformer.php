<?php

namespace App\Transformers;

use App\Ontology;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource;

final class OntologyTransformer extends TransformerAbstract
{
    
	public function transform(Ontology $ontology): array
	{
		return [
			'id'   => (int) $ontology->id,
			'name' => $ontology->name,
		];
	}
    
    
    public function includeUser(Ontology $ontology): Resource\Item
	{
		return $this->item(
            $ontology->user,
            (new UserTransformer)->hideEmail()
        );
	}
    
}
