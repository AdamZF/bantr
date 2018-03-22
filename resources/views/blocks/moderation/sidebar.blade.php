@extends('blocks.base_nosidebar')

@section('content')


  <div class="sidebar-uncompiled bo-6 bo-md-6 bo-sm-12">
    <form action="update-sidebar" method="POST">
      <textarea name="sidebar-text" id="sidebar" class=" textarea textarea-sidebar-edit">{{$block->sidebar_uncompiled}}</textarea>

      <input type="hidden" name="block" value="{{$block->name}}">
      {!! csrf_field() !!}
      <ul class="bl-action-list-1">
        <li><button type="button" class="btn btn-pad-sm btn-green" onclick="previewsidebar()">Preview</button></li>
        <li><button class="btn btn-pad-sm btn-blue">Update</button></li>
      </ul>
  </form>
  </div><div id="sidebar-compiled" class="b-sidebar sidebar-compiled bo-6 bo-md-6 bo-sm-12">
    {!! $block->sidebar_compiled !!}
  </div>


@endsection
