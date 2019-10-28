<?php

namespace App\Models\Production;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Production\Traits\Attribute\ProductAttribute;
use App\Models\Production\Traits\Relationship\ProductRelationship;

class Product extends Model
{
    use SoftDeletes,
        ProductAttribute,
        ProductRelationship;

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
