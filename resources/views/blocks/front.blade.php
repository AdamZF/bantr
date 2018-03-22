<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token" content="{{ csrf_token()}}" >
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <title>Bantr</title>
    <meta name="description" content="Not enough users to be the front page of the internet">

    <link rel="icon" type="image/png" href="{{URL::asset('assets/images/favicon.png')}}">
    <!-- Icons !-->
    <link rel="stylesheet" href="{{URL::asset('assets/font-awesome/css/font-awesome.css')}}">

        {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <!-- Fonts !-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!-- CSS !-->
    <link rel="stylesheet" href="{{URL::asset('assets/css/bantr.css')}}">
    <!-- JS !-->
    <script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>
    <script src="{{URL::asset('assets/js/bantr.js')}}"></script>

    @if(Auth::user())
      <?php $counter = Auth::user()->counter; ?>
    @endif
    
    

</head>
<body class="b-body-front">

@include('blocks.menu.block_menu')

  @include('nav.nav_small')


<div class="b-block-wrapper">
<div class="container-full">

  <div class="container-front">
    <a class="front-name" href="/">Bantr.io</a>

    <div class="front-nav">
      <ul class="front-sort-ul">

        <li @if(isset($sort) && $sort === 'hot' || !isset($sort)) class="sorted_by" @endif> <a href="/">hot</a></li>
        <li @if(isset($sort) && $sort === 'rising') class="sorted_by" @endif><a href="/rising">rising</a></li>
        <li @if(isset($sort) && $sort === 'top') class="sorted_by" @endif><a href="/top">top</a></li>
        <li @if(isset($sort) && $sort === 'new') class="sorted_by" @endif><a href="/new">new</a></li>
      </ul>
    </div>
      @include('blocks.main_sidebar')

    <div class="front-content bl-9 bl-md-8 bl-sm-12">
    <button onclick="toggle_sidebar('page-side')" class="toggle-sidebar">Toggle Sidebar</button>
    @foreach($posts as $post)
      @if($post->type === 'self')
        @include('blocks.post.preview_self')
      @elseif($post->type === 'link')
        @include('blocks.post.preview_link')
      @endif
    @endforeach
    @if($posts->nextPageUrl())
      <div id="paginate-append"></div>
      <button onclick="loadnext()" id="load-next">LoadNextPage</button>
      <span id="paginate-next-page" data-next="{!! $posts->nextPageUrl() !!}"></span>
    @else
      <h3 class="card card-blue light">No More Posts to Show</h3>
    @endif

  </div>
  </div>



</div>
</div>


</body>
</html>
