<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = ['user_id', 'contest_id'];

    public function user()
    {
      return $this->belongsTo('App\User');
    }

    public function contest()
    {
      return $this->belongsTo('App\Contest');
    }

    public function participantDetail()
    {
      return $this->hasMany('App\ParticipantDetail');
    }
}
