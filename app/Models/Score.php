<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Provider;
use App\Models\User;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'provider_id',
        'score'
    ];

    public function provider() {
        return $this->belongsTo(Provider::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
