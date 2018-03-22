@extends('user.profile.base')

@section('content')
<div class="container">
  <h2 class="card card-blue light"><a href="/u/{{$user->username}}">{{$user->username}}</a> Posts</h2>
  <hr>
  <div class="sorting">
    <h3 class="light">Sort by:</h3>
      <ul class="inline">
        <li><a href="posts?sort=top">Top</a></li>
        <li><a href="posts?sort=new">New</a></li></ul>
  </div>
  @foreach($posts as $post)
    @include('blocks.post.render_prev')
  @endforeach
@if($posts->nextPageUrl())
  <div id="paginate-append"></div>
  <button onclick="loadnext()" id="load-next">LoadNextPage</button>
  <span id="paginate-next-page" data-next="{!! $posts->nextPageUrl() !!}"></span>
@else
  <h3 class="card card-blue light">No More Posts to Show</h3>
@endif
</div>
@endsection
