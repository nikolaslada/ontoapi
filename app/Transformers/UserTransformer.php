<?php

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;

final class UserTransformer extends TransformerAbstract
{
    
    /** @var bool */
    protected $showEmail = true;
    
    
	public function transform(User $user): array 
	{
		$response = [
			'id' => $user->id,
			'name' => $user->name,
		];
        
		if ($this->showEmail === true) {
			$response['email'] = $user->email;
		}
        
		return $response;
	}
    
    
	public function hideEmail(): UserTransformer
	{
		$this->showEmail = false;
		return $this;
	}
    
}
