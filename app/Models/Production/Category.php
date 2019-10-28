<?php

namespace App\Models\Production;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Production\Traits\Attribute\CategoryAttribute;
use App\Models\Production\Traits\Relationship\CategoryRelationship;

class Category extends Model
{
    use SoftDeletes,
        CategoryAttribute,
        CategoryRelationship;

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
        'status', 
    ];
}
