<?php

namespace App\Models\Production\Traits\Relationship; 
use App\Models\Production\Category;
use App\Models\Transaction\Order;

/**
 * Class ProductRelationship.
 */
trait ProductRelationship
{
    
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function orders(){
        
        return $this->belongsToMany(Order::class)->withPivot("quantity");
    }
}
