<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{

    // Fillables
    public $fillable = [
        'call',
        'frn',
        'type',
        'prev_sign',
        'prev_class',
        'trustee_sign',
        'trustee_name',
        'operator_name',
        'addr1',
        'addr2',
    ];
}
