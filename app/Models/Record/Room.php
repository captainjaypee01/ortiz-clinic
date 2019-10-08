<?php

namespace App\Models\Record;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Record\Traits\Attribute\RoomAttribute;
use App\Models\Record\Traits\Relationship\RoomRelationship;

class Room extends Model
{
    use SoftDeletes,
        RoomAttribute,
        RoomRelationship;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */

    protected $primaryKey  = 'id';
    protected $fillable = [ 
        'id',
        'branch_id',
        'name', 
        'status', 
    ];
}
