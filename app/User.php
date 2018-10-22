<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Profile;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile ()
    {
        return $this->hasOne(Profile::class);
    }

    public function schedule ()
    {
        return $this->hasOne(Schedule::class);
    }

    public function events_doctor ()
    {
        return $this->hasMany(Event::class, 'doctor');
    }

    public function events_paciente ()
    {
        return $this->hasMany(Event::class, 'paciente');
    }

}
