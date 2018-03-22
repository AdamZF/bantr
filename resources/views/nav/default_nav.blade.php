
<nav class="nav-default">
      <img class="nav-logo" src="{{URL::asset('assets/images/logo_white.png')}}">

  <div class="nav-right">
  <ul class="block-menu sublist">
    <li><a id="#toggle-submenu" onclick="togglesubmenu">My Blocks <i class="fa fa-caret-down"></i></a></li>
    <li><a href="/b/All">All</a></li>
    <li><a href="/b/Front">Front</a></li>
    |
    @if(Auth::guest())

    @elseif(Auth::user())
      @foreach(Auth::user()->subs as $sub)
      <li><a href="/b/{{$sub->block_name}}">{{$sub->block_name}}</a></li>
      @endforeach
    @endif

  </ul>

    <ul class="nav-default-right">
      @if(Auth::user())
      <li><a href="/"><i class="fa fa-globe"></i></a></li>
      <li><a href="/messages"><i class="fa fa-envelope"></i></a></li>
      <li><a href="/notifications"><i class="fa fa-info"></i></a></li>
      <li><a href="/search"><i class="fa fa-search"></i></a></li>
      <li class="nav-right-dropdown"><a class="nav-right-user" href="/account/settings">
      {{Auth::user()->username}}</a>
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
  </div>
</nav>
