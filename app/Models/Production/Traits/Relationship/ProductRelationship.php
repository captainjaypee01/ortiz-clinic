<?php

namespace App\Models\Production\Traits\Relationship; 
use App\Models\Production\Category;
 
/**
 * Class ProductRelationship.
 */
trait ProductRelationship
{
    
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
