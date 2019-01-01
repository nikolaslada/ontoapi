<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

final class OntologyTransformer extends TransformerAbstract
{
    
	public function transform(\stdClass $data): array
	{
		return [
			'id' => (int) $data->id,
			'name' => $data->name,
            'user' => [
                'id' => (int) $data->userId,
                'name' => $data->userName,
            ],
		];
	}
    
}
