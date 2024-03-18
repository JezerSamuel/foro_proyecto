<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 
        'university_id',
        'event_role_id',
        'registration_date',
        'valid_until',
        'imagen',
        'folio',
        'topic',
    ];
}
