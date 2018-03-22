@extends('blocks.base')

@section('content')
<div class="container">
  <h1>/s/{{$section->name}} Settings</h1>
  <h3>Sidebar</h3>
<form action="/section/update/settings" method="POST">
  {!! csrf_field() !!}
  <input type="hidden" name="section_name" value="{{$section->name}}">
  <textarea class="txt-area-settings" name="sidebar">{{$section->sidebar}}</textarea>
  <button type="submit" class="btn btn-preview">Submit</button>
</form>
</div>
@endsection('content')
