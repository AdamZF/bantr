@include('blocks.menu.block_menu')
<nav class="nav-default nav-fixed nav-under-block-menu">

    <img class="nav-logo" src="{{URL::asset('assets/images/logo_white.png')}}">
    <ul class="nav-default-right">
      @if(Auth::user())
      <li><a href="/feed"><i class="fa fa-globe"></i></a></li>
      <li><a href="/messages"><i class="fa fa-envelope"></i></a></li>
      <li><a href="/notifications"><i class="fa fa-info"></i></a></li>
      <li><a href="/search"><i class="fa fa-search"></i></a></li>
      <li class="nav-right-dropdown"><a class="nav-right-user" href="/account/settings">
      {{Auth::user()->signature}}</a>
      <ul>
          <li><a href="/u/{{Auth::user()->signature}}">Profile</a></li>
          <li><a href="/account/settings">Settings</a></li>
          <li><a href="/logout">Logout</a></li>
        </ul>
      </li>
      <li class="nav-right-avatar"><img src="{{Auth::user()->avatar_link}}"></li>
      @else
        <li><a href="/register">Register</a></li>
        <li><a href="/">Login</a></li>
      @endif
    </ul>
</nav>
