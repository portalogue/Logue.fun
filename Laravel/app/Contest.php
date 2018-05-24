<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    protected $fillable = ['id_committee', 'name', 'category', 'checkinTime', 'place', 'type', 'format', 'cost', 'deadline', 'desc', 'poster', 'timeline', 'bracket'];

    public function participants()
    {
      return $this->hasMany('App\Participant');
    }
}
