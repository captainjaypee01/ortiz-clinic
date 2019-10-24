<?php

namespace App\Models\Record;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Record\Traits\Attribute\SymptomAttribute;
use App\Models\Record\Traits\Relationship\SymptomRelationship;

class Symptom extends Model
{
    use SoftDeletes,
        SymptomAttribute,
        SymptomRelationship;

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
 

    protected $fillable = [
        'id',
        'name',
        'description', 
        'status', 
    ];
}
