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


</head>
<body class="b-body-front">

@include('blocks.menu.block_menu')

  @include('nav.nav_small')


<div class="b-block-wrapper">
<div class="container-full">
  <div class="container-front">
    <a class="front-name" href="Bantr.io">Bantr.io</a>

    <div class="bl-12 bl-sm-12 front-nav">
      <ul class="front-sort-ul">
        <li><a href="/">hot</a></li>
        <li><a href="/rising">rising</a></li>
        <li><a href="/top">top</a></li>
        <li><a href="/new">new</a></li>
      </ul>
    </div>
    <div class="front-content">
    @foreach($posts as $post)
      @if($post->type === 'self')
        @include('blocks.post.preview_self')
      @elseif($post->type === 'link')
        @include('blocks.post.preview_link')
      @endif
    @endforeach
  </div>
  </div>



</div>
</div>


</body>
</html>
