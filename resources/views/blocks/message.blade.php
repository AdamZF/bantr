@extends('blocks.base')

@section('content')
  <div class="container">
    <h2 class="h-tspaced light">Message the /b/{{$block->name}} Moderators</h2>
    <hr>

    <form class="form-std" action="/sendblockmessage" method="POST">
      <h2 class="h-tspaced light">Subject</h2>
      <input type="text" name="subject">
      <h2 class="h-tspaced light">Body</h2>
      {!! csrf_field() !!}
      <input type="hidden" name="block" value="{{$block->name}}">
      <textarea name="body"></textarea><br>
      <button class="btn btn-blue">Send</button>
    </form>
  </div>
@endsection
