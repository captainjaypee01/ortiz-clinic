<?php

namespace App\Models\Record\Traits\Relationship;
use App\Models\Record\Branch;
use App\Models\Transaction\Reservation;

/**
 * Class ServiceRelationship.
 */
trait ServiceRelationship
{
    public function branches()
    {
        return $this->belongsToMany(Branch::class);
    }
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}
