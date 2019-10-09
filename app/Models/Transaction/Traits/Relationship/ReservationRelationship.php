<?php

namespace App\Models\Transaction\Traits\Relationship;

use App\Models\Auth\User;
use App\Models\Record\Service;

/**
 * Class ReservationRelationship.
 */
trait ReservationRelationship
{
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
