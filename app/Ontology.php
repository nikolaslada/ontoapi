<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations;

final class Ontology extends Model
{
    
    /** @var string */
    protected $table = 'ontologies';
    
    
    public function user(): Relations\BelongsTo {
        return $this->belongsTo(User::class);
    }
    
}
