@extends('blocks.moderation.base')

@section('content')

<div class="container">
  <h1 class="h-tspaced light t-center"><a style="color: #0000bb; text-decoration: none"  href="/b/{{$block->name}}">/b/{{$block->name}}</a> settings</h1>
  <hr>
  <form class="form-std" action="/updatesettings" method="POST">
    {!! csrf_field() !!}
    <h3><b>Title</b> (64 chars)</h3>
    <input type="text" name="title" value="{{$block->title}}">
    <input type="hidden" name="block_name" value="{{$block->name}}">
    <br><br>
    <h3><b>Description</b> (1000 chars)</h3>
    <textarea name="description">{{$block->description}}</textarea><br>

    <button class="btn btn-blue">Update</button>
  </form>
</div>

@endsection('content')
