<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Provider;

class Promote extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider_id',
        'end_date'
    ];

    public function provider() {
        return $this->belongsTo(Provider::class);
    }
}
