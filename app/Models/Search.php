<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Provider;

class Search extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider_id',
        'day',
        'month',
        'year'
    ];

    public function provider() {
        return $this->belongsTo(Provider::class);
    }
}
