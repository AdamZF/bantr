<nav class="nav-default nav-messages">
    <img class="nav-logo" src="{{URL::asset('assets/images/logo_white.png')}}">
    <a id="msg-menu-tog"><i class="fa fa-navicon"></i></a>
    <ul class="nav-default-right">
      @if(Auth::user())
      <li><a href="/"><i class="fa fa-globe"></i></a></li>
      <li><a href="/messages"><i class="fa fa-envelope"></i></a></li>
      <li><a href="/notifications"><i class="fa fa-info"></i></a></li>
      <li><a href="/search"><i class="fa fa-search"></i></a></li>
      <li class="nav-right-dropdown msg-dropdown"><a class="nav-right-user" href="/account/settings">
      <span class="bl-md-hide">{{Auth::user()->username}}</span> <i class="fa fa-user"></i></a>
      <ul>
          <li><a href="/u/{{Auth::user()->username}}">Profile</a></li>
          <li><a href="/account/settings">Settings</a></li>
          <li><a href="/logout">Logout</a></li>
        </ul>
      </li>
      @else
        <li><a href="/register">Register</a></li>
        <li><a href="/">Login</a></li>
      @endif
    </ul>
</nav>
