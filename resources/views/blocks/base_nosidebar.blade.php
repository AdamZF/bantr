@include('headers.block_header')

<body class="b-body-default">
  @include('blocks.menu.block_menu')
  @if($block->banner)
  <div class="b-head b-banner" style="background-image: url('{{$block->banner}}')">
  @else
  <div class="b-head">
  @endif
  @if($block->logo)
  <img class="b-logo" src="{{$block->logo}}">
  @endif
    <a class="b-name" href="/b/{{$block->name}}">/b/{{$block->name}}</a>

    <div class="bl-12 bl-sm-12 b-nav">
      <ul class="b-sort-ul">
        <li><a href="/b/{{$block->name}}/">hot</a></li>
        <li><a href="/b/{{$block->name}}/rising">rising</a></li>
        <li><a href="/b/{{$block->name}}/top">top</a></li>
        <li><a href="/b/{{$block->name}}/new">new</a></li>
      </ul>
    </div>
</div>
<div class="b-block-wrapper">
<div class="container-full">
    @yield('content')
</div>
</div>

</body>
</html>
