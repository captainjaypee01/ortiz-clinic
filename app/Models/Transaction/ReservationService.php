<?php

namespace App\Models\Transaction;

use App\Models\Record\Branch;
use App\Models\Record\Service;
use Illuminate\Database\Eloquent\Model;

class ReservationService extends Model
{
    protected $table = 'reservation_service';
    protected $fillable = [ 
        'id',
        'reservation_id',
        'branch_id',
        'service_id',
        'room_id',
        'employee_id',
        'reservation_date',
        'reservation_time',
        'duration',
    ];

    public function reservation(){
        return $this->hasOne(Reservation::class);
    }

    public function service(){
        return $this->hasOne(Service::class);
    }

    public function branch(){
        return $this->hasOne(Branch::class);
    }

}
