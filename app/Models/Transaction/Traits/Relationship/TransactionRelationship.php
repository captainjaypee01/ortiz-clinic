<?php

namespace App\Models\Transaction\Traits\Relationship;

use App\Models\Auth\User;
use App\Models\Transaction\Order;
use App\Models\Transaction\Reservation;

/**
 * Class OrderRelationship.
 */
trait TransactionRelationship
{
    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function reservation(){
        return $this->hasOne(Reservation::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
