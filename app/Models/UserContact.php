<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    
     // Fillables
     public $fillable = [
        'user_id',
        'call',
        'rx',
        'tx'
     ];
}
