<?php

namespace App\Models\Record\Traits\Relationship;

use App\Models\Record\Branch; 
 
/**
 * Class RoomRelationship.
 */
trait RoomRelationship
{
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    
}
