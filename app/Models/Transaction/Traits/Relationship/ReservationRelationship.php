<?php

namespace App\Models\Transaction\Traits\Relationship;

use App\Models\Auth\User;
use App\Models\Record\Service;

/**
 * Class ReservationRelationship.
 */
trait ReservationRelationship
{
    public function services()
    {
        return $this->belongsToMany(Service::class)->withPivot(['branch_id', 'room_id', 'employee_id', 'reservation_date', 'reservation_time']);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
