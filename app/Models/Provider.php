<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
use App\Models\Image;

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
        'image_id',
        'description',
        'color'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function owner() {
        return $this->belongsTo(User::class);
    }
    public function image() {
        return $this->belongsTo(Image::class);
    }
}
