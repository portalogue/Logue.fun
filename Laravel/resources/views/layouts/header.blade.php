<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper">
    <a class="navbar-brand brand-logo" href="{{route('landingpage')}}"><img src="{{asset('images/logo.png')}}" alt="logo"></a>
    <a class="navbar-brand brand-logo-mini" href="{{route('landingpage')}}"><img src="{{asset('images/logo_short.png')}}" alt="logo"></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center">
    <p class="page-name d-none d-lg-block">Hi, {{Auth::user()->name}}</p>
    <ul class="navbar-nav ml-lg-auto">
      <li class="nav-item d-none d-sm-block profile-img">
        <a class="nav-link profile-image" href="#" data-toggle="dropdown">
          <img src="{{asset('storage/'.Auth::user()->photo)}}" alt="">
          <span class="online-status online bg-success"></span>
        </a>
        <div class="dropdown-menu navbar-dropdown dropdownAnimation">
          <a class="dropdown-item" href="{{route('profile')}}">
            Profile
          </a>
          <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                       <span class="menu-title">Logout</span>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </div>
      </li>
    </ul>
    <button id="mobile-collapse" class="navbar-toggler navbar-toggler-right d-lg-none align-self-center ml-auto" type="button" data-toggle="offcanvas">
      <span class="icon-menu icons"></span>
    </button>
  </div>
</nav>
