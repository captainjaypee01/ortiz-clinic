<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Transaction\Traits\Attribute\ReservationAttribute;
use App\Models\Transaction\Traits\Relationship\ReservationRelationship;

class Reservation extends Model
{
    use SoftDeletes,
        ReservationAttribute,
        ReservationRelationship;

    /**
        * The attributes that are mass assignable.
        *
        * @var array
    */

    protected $primaryKey  = 'id';
    protected $fillable = [ 
        'user_id',
        'employee_id',
        'service_id',
        'branch_id',
        'room_id', 
        'reservation_date',
        'start_time',
        'end_time',
        'total_amount',
        'payment_location',
        'payment_status',
        'status', 
    ];
}
