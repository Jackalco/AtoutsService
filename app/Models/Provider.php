<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\Category;
use App\Models\User;
use App\Models\Image;
use App\Models\Score;
use App\Models\Comment;

class Provider extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'address',
        'city',
        'email',
        'phone',
        'owner',
        'user_id',
        'structure',
        'workforce',
        'activity',
        'siret',
        'date',
        'grade',
        'image_id',
        'description',
        'color',
        'end_date'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function image() {
        return $this->belongsTo(Image::class);
    }

    public function scores() {
        return $this->hasMany(Score::class);
    }

    public function average() {
        $evaluations = Score::where('provider_id', $this->id)->get();
        $sum = null;

        if(count($evaluations)) {
            foreach($evaluations as $evaluation) {
                $sum += $evaluation->score;
            }
            $temporary_average = $sum/count($evaluations);
            return number_format($temporary_average, 1, ',', ' ');

        }
        else {
            return null;
        }
    }

    public function comments() {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }

}
