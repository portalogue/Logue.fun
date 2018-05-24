@extends('layouts.app')
@section('content')
<div class="row user-profile">
  <div class="col-lg-4 side-left d-flex align-items-stretch">
    <div class="row">
      <div class="col-12 grid-margin">
        <div class="card">
          <div class="card-body avatar">
            <h4 class="card-title">Info</h4>
            <img src="{{asset('storage/'.Auth::user()->photo)}}" style="max-height: 150px; max-width: 150px">
            <p class="name">{{Auth::user()->name}}</p>
            <a class="d-block text-center text-dark" href="#">{{Auth::user()->email}}</a>
            <a class="d-block text-center text-dark" href="#">{{Auth::user()->phone}}</a>
            @if (Auth::user()->role == "Member")
              <form action="{{route('user.be.committee', ['user' => Auth::user()->id])}}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary full-width">Be Committee</button>
              </form>
            @endif
          </div>
        </div>
      </div>
      {{-- <div class="col-12 stretch-card">
        <div class="card">
          <div class="card-body overview">
            <ul class="achivements">
              <li><p>34</p><p>Projects</p></li>
              <li><p>23</p><p>Task</p></li>
              <li><p>29</p><p>Completed</p></li>
            </ul>
            <div class="wrapper about-user">
              <h4 class="card-title mt-4 mb-3">About</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam consectetur ex quod.</p>
            </div>
            <div class="info-links">
              <a class="website" href="http://urbanui.com/">
                <i class="mdi mdi-earth text-gray"></i>
                <span>http://urbanui.com/</span>
              </a>
              <a class="social-link" href="#">
                <i class="mdi mdi-facebook text-gray"></i>
                <span>https://www.facebook.com/johndoe</span>
              </a>
              <a class="social-link" href="#">
                <i class="mdi mdi-linkedin text-gray"></i>
                <span>https://www.linkedin.com/johndoe</span>
              </a>
            </div>
          </div>
        </div>
      </div> --}}
    </div>
  </div>
  <div class="col-lg-8 side-right stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="wrapper d-block d-sm-flex align-items-center justify-content-between">
          <h4 class="card-title mb-0">Details</h4>
          <ul class="nav nav-tabs tab-solid tab-solid-primary mb-0" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-expanded="true">Info</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="security-tab" data-toggle="tab" href="#security" role="tab" aria-controls="security">Security</a>
            </li>
          </ul>
        </div>
        <div class="wrapper">
          <hr>
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info">
              <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @method('PUT')
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="form-control" id="name" value="{{Auth::user()->name}}" required>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" id="email" value="{{Auth::user()->email}}" required>
                </div>
                <div class="form-group">
                  <label for="gender">Gender</label>
                  <div class="row">
                    <div class="col-md-2">
                      <div class="form-check">
                        @if (Auth::user()->gender == 'Male')
                          <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Male" checked required>
                          @else
                            <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Male" required>
                        @endif
                        <label class="form-check-label" for="exampleRadios1">
                          Male
                        </label>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-check">
                        @if (Auth::user()->gender == 'Female')
                          <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="Female" checked required>
                          @else
                            <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="Female" required>
                        @endif
                        <label class="form-check-label" for="exampleRadios2">
                          Female
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="mobile">Birthday</label>
                  <input type="date" name="birthday" class="form-control" id="mobile" value="{{Auth::user()->birthday}}">
                </div>
                <div class="form-group">
                  <label for="mobile">Phone</label>
                  <input type="text" name="phone" class="form-control" id="mobile" value="{{Auth::user()->phone}}">
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <textarea name="address" name="address" id="address" rows="6" class="form-control">{{Auth::user()->address}}</textarea>
                </div>
                <div class="form-group">
                  <label for="mobile">Photo</label>
                  <input type="file" name="photo" class="form-control" id="mobile">
                </div>
                <div class="form-group mt-5">
                  <button type="submit" class="btn btn-success mr-2">Update</button>
                  <a href="{{route('home')}}" class="btn btn-outline-danger"> Cancel</a>
                </div>
              </form>
            </div><!-- tab content ends -->
            <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="security-tab">
              <form action="{{route('profile.security.update')}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="change-password">Change password</label>
                  <input type="password" name="password_old" class="form-control" id="change-password" placeholder="Enter you current password" required>
                </div>
                <div class="form-group">
                  <input type="password" name="password_new" class="form-control" id="new-password" placeholder="Enter you new password" required>
                </div>
                <div class="form-group mt-5">
                  <button type="submit" class="btn btn-success mr-2">Update</button>
                  <button class="btn btn-outline-danger">Cancel</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
