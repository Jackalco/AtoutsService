<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'city',
        'address',
        'email',
        'phone',
        'owner',
        'image_id',
        'owner_id'
    ];
}
