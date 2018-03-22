@extends('user.profile.base')

@section('content')
<div class="container">
  <h1 class="card card-blue"><a href="/u/{{$user->username}}">/u/{{$user->username}}</a> comments</h1>
  <hr>
  @if($comments->count() === 0) 
    <h3 class="light empty">This User Hasn't Commented Yet</h3>
  @endif

  @foreach($comments as $comment)
    @include('blocks.comment.single')
  @endforeach
@if($comments->nextPageUrl())
  <div id="paginate-append"></div>
  <button onclick="loadnext()" id="load-next">LoadNextPage</button>
  <span id="paginate-next-page" data-next="{!! $comments->nextPageUrl() !!}"></span>
@else
  <h3 class="card card-blue light">No More Comments to Show</h3>
@endif
</div>
@endsection
