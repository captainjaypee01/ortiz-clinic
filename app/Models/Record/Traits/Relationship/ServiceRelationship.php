<?php

namespace App\Models\Record\Traits\Relationship;
use App\Models\Record\Branch;
 
/**
 * Class ServiceRelationship.
 */
trait ServiceRelationship
{
    public function branches()
    {
        return $this->belongsToMany(Branch::class);
    }
}
