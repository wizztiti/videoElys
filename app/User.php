<?php

namespace App;

use App\Models\Formation;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lastname', 'firstname', 'email', 'password', 'confirmation_token', 'address', 'postal_code', 'city', 'country',
        'newsletter',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function videos() {
        return $this->belongsToMany('App\Models\Video', 'videos_users');
    }

    public function formations() {
        return $this->belongsToMany(Formation::class)->withPivot('bought_at');
    }
}
