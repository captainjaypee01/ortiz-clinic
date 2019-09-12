<?php

namespace App\Models\Record;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Record\Traits\Attribute\BranchAttribute;
use App\Models\Record\Traits\Relationship\BranchRelationship;

class Branch extends Model
{
    use SoftDeletes,
        BranchAttribute,
        BranchRelationship;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */

    protected $primaryKey  = 'id';
    protected $fillable = [ 
        'id',
        'name',
        'contact_number',
        'tel_number',
        'location',
        'barangay',
        'city',
        'province',
        'country',
        'address_line_1',
        'status', 
    ];
}
