<?php

namespace App\Http\Controllers;

use App\Participant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    public function join(Contest $contest)
    {
      return response()->json($contest);
    }
}
