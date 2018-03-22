
<nav class="block-menu block-menu-fixed">
  <ul class="sublist">
    <li><a id="#toggle-submenu" onclick="togglesubmenu">My Blocks <i class="fa fa-caret-down"></i></a></li>
    <li><a href="/b/All">All</a></li>
    <li><a href="/b/Front">Front</a></li>
    |
    @if(Auth::guest())
      @include('blocks.sublist.defaults')
    @elseif(Auth::user())
      @foreach(Auth::user()->subs as $sub)
      <li><a href="/b/{{$sub->block_name}}">{{$sub->block_name}}</a></li>
      @endforeach
    @endif

  </ul>
</nav>
