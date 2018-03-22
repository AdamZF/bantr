
@extends('blocks.submit.base')

@section('content')
<div class="container">
  <form class="block-post-form" id="block-link-post" action="/b/{{$block->name}}/submit_post" method="POST">
    <h1 class="light h-tspaced">New Link:</h1>
    <h5 class="h-tspaced"><a href="/b/{{$block->name}}/submit/self">Did you want to submit a self post instead?</a></h5>
  <input name="link" type="text" placeholder="Link"><br>
  {!! csrf_field() !!}
  <input name="title" type="text" placeholder="Title">
  <input type="hidden" value="link" name="type">
@if(count($errors) > 0)
  @foreach($errors->all() as $error)
    <h4 class="error">{{$error}}</h4>
  @endforeach
@endif
  <hr><br>
  <button type="submit" class="btn block-submit">Submit</button>

  </form>
  </div>

@endsection
