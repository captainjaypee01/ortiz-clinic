<?php

namespace App\Models\Record;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Record\Traits\Attribute\ServiceAttribute;
use App\Models\Record\Traits\Relationship\ServiceRelationship;

class Service extends Model
{
    use SoftDeletes,
        ServiceAttribute,
        ServiceRelationship;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */

    protected $primaryKey  = 'id';

    protected $fillable = [
        'id',
        'name',
        'description',
        'unit',
        'price', 
        'status', 
    ];
}
