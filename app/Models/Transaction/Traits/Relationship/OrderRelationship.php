<?php

namespace App\Models\Transaction\Traits\Relationship;

use App\Models\Auth\User;
use App\Models\Production\Product;
 
/**
 * Class OrderRelationship.
 */
trait OrderRelationship
{
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot("quantity");
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    
}
