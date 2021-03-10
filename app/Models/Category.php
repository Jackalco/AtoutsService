<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Image;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category',
        'image_id'
    ];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
