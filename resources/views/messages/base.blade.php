
@include('headers.messages_header')
<body id="messages_body" onload="m_setup()">
@include('nav.messages_nav')

<div id="conversation_wrapper" class="container-full">
<div id="msg-menu-left" class="bl-2 bl-lg-3 bl-md-hide bl-md-12 t-center message-menu-left">
  <h2 class="fw-light msg-menu-hd"><a href="/messages/">Messaging <i class="fa fa-envelope"></i></a></h2>
  <ul class="msg-menu">
    <li><a href="/messages/compose">Start New <i class="fa fa-plus"></i></a></li>
    <li><a href="/messages/new">New</a></li>
    <li><a href="/messages/old">Old</a></li>
    @if(Auth::user()->ismod())
      <li><a href="/messages/moderator">Mod Mail</a></li>
    @endif
    <li><a href="/messages/direct">Direct</a></li>
    <li><a href="/messages/group">Group</a></li>
  </ul>
</div>
<div id="msg_right" class="bl-10 bl-lg-9 bl-md-12 bl-sm-12">
  @yield('content')
</div>

</div>

</div>
</body>
</html>
