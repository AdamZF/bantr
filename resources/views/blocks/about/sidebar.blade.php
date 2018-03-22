@extends('blocks.base_nosidebar')
@section('content')


  <div class="sidebar-uncompiled bo-6 bo-md-6 bo-sm-12">
    <form action="sidebar/update" method="POST">
      <textarea name="sidebar-text" id="sidebar" class=" textarea textarea-sidebar-edit">{{$block->sidebar_uncompiled}}</textarea>

      <input type="hidden" name="block" value="{{$block->name}}">
      {!! csrf_field() !!}
      <ul class="bl-action-list-1">
        <li><a class="bl-action-preview" onclick="previewsidebar()">Preview</a></li>
        <li><button class="bl-action-update">Update</button></li>
      </ul>
  </form>
  </div><div id="sidebar-compiled" class="b-sidebar sidebar-compiled bo-6 bo-md-6 bo-sm-12">
    {!! $block->sidebar_compiled !!}
  </div>

@endsection
