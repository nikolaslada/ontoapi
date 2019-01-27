<?php

use Illuminate\Database\Seeder;

class OntologiesTableSeeder extends Seeder
{
    
    public function run(): void
    {
        $user = factory(\App\User::class)->create();
        
        factory(\App\Ontology::class, 2)->create([
        	'user_id' => $user->id,
            'name' => $user->name . "'s Ontology",
        ]);
    }
    
}
