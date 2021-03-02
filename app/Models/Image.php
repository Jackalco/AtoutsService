<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image as ImagesIntervention;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'path'
    ];

    public static function storeImage($imageName)
    {

        $image = $imageName;

        $imageExtension = $imageName->getClientOriginalExtension();

        $imageName = time().'.'.$imageExtension;
        $image->storeAs('imagesUploaded', $imageName, 'public');
        ImagesIntervention::make(public_path('storage/imagesUploaded/'.$imageName))->save();

        $storedImage = self::insertGetId([
            'path' => $imageName,
        ]);

        return $storedImage;
    }
}
