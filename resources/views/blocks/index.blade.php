@include('headers.block_header')

<body class="b-body-default">
  @if(Auth::user())
    <?php $mod = $block->ismod($block->name); ?>
  @endif

  @include('blocks.menu.block_menu')

  @if($block->banner)
  <div class="b-head b-banner" style="background-image: url('{{$block->banner}}')">
  @else
  <div class="b-head">
  @endif
  @if($block->logo)
  <img class="b-logo" src="{{$block->logo}}">
  @endif
      @include('nav.nav_small')
    <a class="b-name" href="/b/{{$block->name}}">{{$block->name}}</a>
    <div class="b-nav">
      <ul class="b-sort-ul">
        <li @if(isset($sort) && $sort === 'hot' || !isset($sort)) class="sorted_by" @endif> <a href="/b/{{$block->name}}/">hot</a></li>
        <li @if(isset($sort) && $sort === 'rising') class="sorted_by" @endif><a href="/b/{{$block->name}}/rising">rising</a></li>
        <li @if(isset($sort) && $sort === 'top') class="sorted_by" @endif><a href="/b/{{$block->name}}/top">top</a></li>
        <li @if(isset($sort) && $sort === 'new') class="sorted_by" @endif><a href="/b/{{$block->name}}/new">new</a></li>
      </ul>
    </div>
</div>
<div class="b-block-wrapper">
<div class="container-full">
  <div class="b-content bl-9 bl-lg-9 bl-md-8 bl-sm-12">
    <button onclick="toggle_sidebar('page-side')" class="toggle-sidebar">Toggle Sidebar</button>
    @if($posts->count() === 0)
      <h3 class="h-none">Nothing Posted Yet</h3>
    @else
      @foreach($posts as $post)

        @if($post->type === "self")
          @include('blocks.post.preview_self')
        @else
          @include('blocks.post.preview_link')
        @endif
      @endforeach
    @endif

    <div id="paginate-append"></div>
    @if($posts->nextPageUrl())
      <button onclick="loadnext()" id="load-next">LoadNextPage</button>
      <span id="paginate-next-page" data-next="{!! $posts->nextPageUrl() !!}"></span>
    @else
      <h3 class="card light card-blue">No More to Load</h3>
    @endif
  </div>
  @include('blocks.sidebar')
</div>
</div>

</body>
</html>
