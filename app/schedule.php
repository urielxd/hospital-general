<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    protected $fillable = ['start', 'end', 'interval'];

    public function user () {
      return $this->belongsTo(User::class);
    }
}
