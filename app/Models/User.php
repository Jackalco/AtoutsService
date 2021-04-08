<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use App\Models\Provider;
use App\Models\Score;
use App\Notifications\MailResetPasswordToken;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    

    public static function auth()
    {
        if(Auth::check()) {
            return true;
        } else {
            return NULL;
        }
    }

    public static function admin() {
        $user = Auth::user();
        if($user->statusLvl == 2) {
            return true;
        } else {
            return false;
        }
    }

    public function own() {
        $providers = Provider::orderBy('name', 'asc')->get();
    }

    public function scores() {
        return $this->hasMany(Score::class);
    }

    public function sendPasswordResetNotification($token) {
        $this->notify(new MailResetPasswordToken($token));
    }
}
