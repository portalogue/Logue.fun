<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParticipantDetail extends Model
{
    protected $fillable = ['participant_id', 'name' ,'email'];
}
