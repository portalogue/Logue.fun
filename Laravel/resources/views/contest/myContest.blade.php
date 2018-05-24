@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h2>Competition List</h2>
    </div>
  </div>
  <div class="row">
    @foreach ($contests as $key => $contest)
      <div class="col-md-4">
        <div class="card">
          <center><img class="card-img-top" src="{{asset('storage/'.$contest->contest->poster)}}" style="max-height: 200px;"></center>
          <div class="card-body">
            <h5 class="card-title">{{$contest->contest->name}}</h5>
            <div class="row mb-3">
              <div class="col-md-6">
                <a href="{{route('contest.show',['contest' => $contest->contest->id])}}" class="btn btn-primary full-width">Show</a>
              </div>
              @if (Auth::user()->role == "Committee")
                <div class="col-md-6">
                  <form action="{{route('contest.destroy', ['contest' => $contest->contest->id])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger full-width">Delete</button>
                  </form>
                </div>
              @endif
            </div>
            <p class="card-text"><small class="text-muted">Last updated {{$contest->contest->updated_at}}</small></p>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <div class="row">
    <div class="col-md-12">
      {{ $contests->links() }}
    </div>
  </div>
</div>
@endsection
