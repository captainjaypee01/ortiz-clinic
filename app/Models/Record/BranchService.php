<?php

namespace App\Models\Record;

use Illuminate\Database\Eloquent\Model;

class BranchService extends Model
{
    protected $table = 'branch_service';
    protected $fillable = [ 
        'id',
        'branch_id',
        'service_id',
    ];
}
