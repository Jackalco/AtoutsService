<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city',
        'email',
        'phone',
        'owner',
        'owner_id',
        'structure',
        'workforce',
        'activity',
        'siret',
        'date',
        'grade',
        'logo',
    ];
}
