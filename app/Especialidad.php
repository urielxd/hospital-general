<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    public function profile ()
    {
        return $this->hasMany(Profile::class);
    }
}
