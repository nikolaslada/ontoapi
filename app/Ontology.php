<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

final class Ontology extends Model
{
    
    public function user(): Relations\HasOne {
        return $this->hasOne(User::class);
    }
    
}
