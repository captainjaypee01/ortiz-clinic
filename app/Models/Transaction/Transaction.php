<?php

namespace App\Models\Transaction;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Transaction\Traits\Attribute\TransactionAttribute;
use App\Models\Transaction\Traits\Relationship\TransactionRelationship;

class Transaction extends Model
{
    use SoftDeletes,
        TransactionAttribute,
        TransactionRelationship;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */

    protected $primaryKey  = 'id';
    protected $fillable = [ 
        'user_id',
        'reference_number',
        'total_amount',
        'total_services',
        'total_products', 
        'image_location',
    ];
}
