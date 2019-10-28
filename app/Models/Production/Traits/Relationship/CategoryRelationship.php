<?php

namespace App\Models\Production\Traits\Relationship; 
use App\Models\Production\Product;
 
/**
 * Class CategoryRelationship.
 */
trait CategoryRelationship
{
    
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
