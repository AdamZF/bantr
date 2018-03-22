@include('headers.default_header') 

<body class="settings">
  @include('blocks.menu.block_menu')
@include('nav.nav_small')

<div class="container">
    <h1 class="light h-white t-center">S E T T I N G S </h1>
    <h4 class="light t-center h-white">Please Note: This page is still under construction...</h4>
    <hr>
    <form class="user-settings" action="/updateusersettings" method="POST">
    {!! csrf_field() !!}
    <input type="checkbox" name="nsfw" value="yes" @if(Auth::user()->nsfw) checked @endif><label class="h-white">Show NSFW content </label><br><br>
    <button class="btn btn-blue">Submit</button>
    </form>
</div>

@include('footers.default')
