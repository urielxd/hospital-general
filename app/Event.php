<?php

namespace App;
use Midnite81\TimeKeeper\Traits\TimeKeeper;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use TimeKeeper;
    protected $fillable = [ 'title', 'description', 'color', 'start', 'end', 'paciente', 'doctor'];
    protected $dates = ['start', 'end'];

    public function medico ()
    {
      return $this->belongsTo(User::class, 'doctor');
    }

    public function cliente ()
    {
      return $this->belongsTo(User::class, 'paciente');
    }

    public function scopeOverlapping($query, $from, $to)
    {
      return $query->past('start', $to)->future('end', $from);
    }

    public function getDoctor($id)
    {
        $doctor = Profile::where('user_id', $id)->first();
        $especialidad = $doctor->especialidad->name;
        return $doctor->nombre;
    }
}
