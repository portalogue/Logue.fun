<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bracket extends Model
{
    protected $fillable = ['contest_id', 'user_id', 'level', 'winner'];

    public function user()
    {
      return $this->belongsTo('App\User');
    }
}
