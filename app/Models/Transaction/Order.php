<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Transaction\Traits\Attribute\OrderAttribute;
use App\Models\Transaction\Traits\Relationship\OrderRelationship;

class Order extends Model
{
    use SoftDeletes,
        OrderAttribute,
        OrderRelationship;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */

    protected $primaryKey  = 'id';
    protected $fillable = [ 
        'user_id',
        'total_orders',
        'payment_location',
        'payment_status',
        'status', 
    ];
}
