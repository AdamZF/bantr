@if(Auth::user())
 <?php $counter = Auth::user()->counter; ?>
@endif

<nav class="nav-small">
    <ul class="nav-default-right">
      @if(Auth::user())
      <li><a href="/"><i class="fa fa-globe"></i></a></li>
      <li><a @if(isset($counter) && $counter->messages > 0) class="notify" @endif href="/messages"><i class="fa fa-envelope"></i></a></li>
      <li><a @if(isset($counter) && $counter->notifications > 0) class="notify" @endif href="/notifications"><i class="fa fa-info"></i></a></li>
      <li><a href="/search"><i class="fa fa-search"></i></a></li>
      <li class="nav-right-dropdown"><a class="nav-right-user" href="/account">
      {{Auth::user()->username}}</a>
      <ul>
          <li><a href="/u/{{Auth::user()->username}}">Profile</a></li>
          <li><a href="/account">Account</a></li>
          <li><a href="/logout">Logout</a></li>
        </ul>
      </li>
      @else
        <li><a href="/register">Register</a></li>
        <li><a href="/login">Login</a></li>
      @endif
    </ul>
</nav>
