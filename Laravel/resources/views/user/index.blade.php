@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Members</h5>
          <table class="table">
            <thead>
              <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $key => $user)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$user->user->name}}</td>
                  <td>{{$user->user->email}}</td>
                  <td>{{$user->user->phone}}</td>
                  <td>
                    @if ($user->user->role == 'Member')
                      <form action="{{route('user.change.committee',['user' => $user->user->id])}}" method="post">
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-success">Change to Committee</button>
                      </form>
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
