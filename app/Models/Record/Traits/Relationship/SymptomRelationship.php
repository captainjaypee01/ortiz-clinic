<?php

namespace App\Models\Record\Traits\Relationship; 
use App\Models\Record\Service; 

/**
 * Class SymptomRelationship.
 */
trait SymptomRelationship
{
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
    
}
