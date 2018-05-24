<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item nav-category">
      <span class="nav-link">GENERAL</span>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('profile')}}">
        <span class="menu-title">Profile</span>
        <i class="icon-speedometer menu-icon"></i>
      </a>
    </li>
    @if (Auth::user()->role == 'Admin')
      <li class="nav-item">
        <a class="nav-link" href="{{route('users')}}">
          <span class="menu-title">Members</span>
          <i class="icon-speedometer menu-icon"></i>
        </a>
      </li>
    @endif
    <li class="nav-item">
      <a class="nav-link" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                   <span class="menu-title">Logout</span>
                   <i class="icon-wrench menu-icon"></i>
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
    </li>
    <li class="nav-item nav-category">
      <span class="nav-link">Contest</span>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{route('contest.index')}}">
        <span class="menu-title">Explore</span>
        <i class="icon-speedometer menu-icon"></i>
      </a>
    </li>
    @if (Auth::user()->role == 'Member')
      <li class="nav-item">
        <a class="nav-link" href="{{route('contest.mine')}}">
          <span class="menu-title">My Competition</span>
          <i class="icon-speedometer menu-icon"></i>
        </a>
      </li>
    @endif
    @if (Auth::user()->role == 'Committee')
      <li class="nav-item">
        <a class="nav-link" href="{{route('contest.committee.mine')}}">
          <span class="menu-title">My Competition</span>
          <i class="icon-speedometer menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('contest.create')}}">
          <span class="menu-title">Create</span>
          <i class="icon-speedometer menu-icon"></i>
        </a>
      </li>
    @endif
  </ul>
</nav>
