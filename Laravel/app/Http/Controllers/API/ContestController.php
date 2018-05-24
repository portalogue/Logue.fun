<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Participant;
use App\ParticipantDetail;
use App\Bracket;

use App\Contest;
use Illuminate\Http\Request;
use Storage;
use Auth;
class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Contest::with('participants')->get());
    }

    public function myContest()
    {
        $contests = Participant::with('contest')->whereHas('contest', function($query)
        {
          $query->where('user_id', Auth::user()->id);
        })->get();
        return response()->json($contests);
    }

    public function myCommitteeContest()
    {
        $contests = Contest::where('id_committee', Auth::user()->id);
        return response()->json($contests);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contest/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if ($request->poster) {
          $poster = Storage::disk('public')->put('contests', $request->poster);
        }else {
          $poster = "";
        }
        $contest = Contest::create([
          'name' => $request->name,
          'id_committee' => $request->id_committee,
          'category' => $request->category,
          'checkinTime' => $request->checkinTime,
          'place' => $request->place,
          'type' => $request->type,
          'format' => $request->format,
          'cost' => $request->cost,
          'deadline' => $request->deadline,
          'poster' => $poster,
          'desc' => $request->desc,
          'timeline' => 'no timeline'
        ]);
        return response()->json($contest);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function show(Contest $contest)
    {
        // $registered = Participant::where([
        //   ['user_id', Auth::user()->id],
        //   ['contest_id', $contest->id]
        //   ])->get();
        //
        // return response()->json($registered);

        return response()->json($contest);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function edit(Contest $contest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $contest = Contest::where('id',$request->id)->first();
        if ($request->poster) {
          $poster = Storage::disk('public')->put('contests', $request->poster);
        }else {
          $poster = $contest->poster;
        }
        $contest->name = $request->name;
        $contest->category = $request->category;
        $contest->checkinTime = $request->checkinTime;
        $contest->place = $request->place;
        $contest->type = $request->type;
        $contest->format = $request->format;
        $contest->cost = $request->cost;
        $contest->deadline = $request->deadline;
        $contest->desc = $request->desc;
        $contest->poster = $poster;
        $contest->save();

        return response()->json($contest);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contest $contest)
    {
        $contest->delete();
        return response()->json($contest);
    }

    public function updateTimeline(Request $request)
    {
      $contest = Contest::where('id', $request->id)->first();
      $contest->timeline = $request->timeline;
      $contest->save();
      return response()->json($contest);
    }

    public function join(Contest $contest)
    {
      $participant = Participant::create([
        'user_id' => Auth::user()->id,
        'contest_id' => $contest->id
      ]);
      return response()->json($participant);
    }

    public function addMember(Request $request)
    {
      $participant_id = Participant::where([
        ['contest_id', $request->contest_id],
        ['user_id', $request->user_id],
        ])->first();
      $participant_detail = ParticipantDetail::create([
        'participant_id' => $participant_id->id,
        'name' => $request->name,
        'email' => $request->email
      ]);
      return response()->json($participant_detail);
    }

    public function changeBracket(Request $request, Contest $contest)
    {
      // $contest->bracket_teams = json_encode($request->teams, true);

      $contest->bracket_results = json_encode($request->results,JSON_NUMERIC_CHECK);
      $contest->bracket_teams = json_encode($request->teams, true);
      $contest->update();
      return response()->json($request->results, 200);
    }
}
