<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Provider;
use App\Models\User;

class Commment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'provider_id',
        'user_id',
        'opinion'
    ];

    public function provider() {
        $this->belongsTo(Provider::class);
    }

    public function user() {
        $this->belongsTo(User::class);
    }
}
