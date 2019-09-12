<?php

namespace App\Models\Record\Traits\Relationship;
use App\Models\Record\Service;
 
/**
 * Class BranchRelationship.
 */
trait BranchRelationship
{
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
    
}
