@include('headers.default_header')

<body id="search">
@include('blocks.menu.block_menu')
@include('nav.nav_small')
<div class="container">
    <h1 class="search-hero t-center">
      <a href="">Bantr:</a><span></span>
  </h1>
  <hr>
  <form class="search-form" action="/search" method="GET">
    <input id="query" type="text"  name="q" Placeholder="Query" @if(isset($query)) value="{{$query}}" @endif>
    <span class="label">Searching for:</span>
    <select name="st">
      <option onmouseup="hide('bn-input')" value="block" @if(isset($st))   @endif>Block</option>
      <option  onmouseup="show('bn-input')" id="option_post" value="post" @if(isset($st)) @if($st === 'post') selected  @endif  @endif>Post</option>
    </select>
  <div id="bn-input" style="display: none">in <input id="block-name" type="text" name="bip" placeholder="Block Name"></div>
    <button type="submit">Search <i class="fa fa-search"></i></button>
  </form>
</div>

@if(isset($result_posts))
  <?php $result_count = $result_posts->count(); ?>
  @elseif(isset($result_blocks))
  <?php $result_count = $result_blocks->count(); ?>
  <div class="container">
    @if(isset($result_count))<h2 class="h-tshadowed h-white light h-tspaced">{{$result_count}} Results for '{{$query}}' @if(isset($block)) in {{$block}} @endif</h2>@endif
    <div id="search-results">
      @if(isset($result_posts))
        @foreach($result_posts as $post)
          @include('search.post_result')
        @endforeach
      @endif

      @if(isset($result_blocks))
        @foreach($result_blocks as $block)
          @include('search.block_result')
        @endforeach
      @endif
    </div>
  </div>
@endif
@include('footers.default')
