@extends('layouts.app')
@push('styles')
  <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-beta.3/classic/ckeditor.js"></script>
@endpush
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <h5 class="card-title">{{$contest->name}}</h5>
              <img src="{{asset('storage/'.$contest->poster)}}" class="img-thumbnail img-fluid">
              @if (count($registered) == 0 && Auth::user()->role != "Admin" && Auth::user()->id != $contest->id_committee)
                @if (count($contest->participants) < 32)
                  <a href="{{route('contest.join', ['contest' => $contest->id])}}" class="btn btn-success full-width">Join</a>
                @endif
              @endif
            </div>
            <div class="col-md-8">
              <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Detail</a>
                  <a class="nav-item nav-link" id="nav-bracket-tab" data-toggle="tab" href="#nav-bracket" role="tab" aria-controls="nav-bracket" aria-selected="false">Bracket</a>
                  <a class="nav-item nav-link" id="nav-timeline-tab" data-toggle="tab" href="#nav-timeline" role="tab" aria-controls="nav-timeline" aria-selected="false">Timeline</a>
                  <a class="nav-item nav-link" id="nav-participant-tab" data-toggle="tab" href="#nav-participant" role="tab" aria-controls="nav-participant" aria-selected="false">Participant</a>
                  @if (Auth::user()->id == $contest->id_committee)
                    <a class="nav-item nav-link" id="nav-setting-tab" data-toggle="tab" href="#nav-setting" role="tab" aria-controls="nav-setting" aria-selected="false">Setting</a>
                  @endif
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                  @include('contest.detail')
                </div>
                <div class="tab-pane fade" id="nav-bracket" role="tabpanel" aria-labelledby="nav-bracket-tab">
                  @if (Auth::user()->id == $contest->id_committee)
                      @include('contest.bracket')
                    @else
                      @include('contest.bracket_member')
                  @endif
                </div>
                <div class="tab-pane fade" id="nav-timeline" role="tabpanel" aria-labelledby="nav-timeline-tab">
                  @include('contest.timeline')
                </div>
                <div class="tab-pane fade" id="nav-participant" role="tabpanel" aria-labelledby="nav-participant-tab">
                  @include('contest.participant')
                </div>
                @if (Auth::user()->id == $contest->id_committee)
                  <div class="tab-pane fade" id="nav-setting" role="tabpanel" aria-labelledby="nav-setting-tab">
                    @include('contest.edit')
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
  ClassicEditor
      .create( document.querySelector( '#editeditor' ) )
      .catch( error => {
          console.error( error );
  } );
  ClassicEditor
      .create( document.querySelector( '#timelineeditor' ) )
      .catch( error => {
          console.error( error );
  } );
</script>
@endpush
