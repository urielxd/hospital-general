<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $fillable = ['name'];

    public function profile ()
    {
        return $this->hasMany(Profile::class);
    }
}
