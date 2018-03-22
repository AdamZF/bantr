@extends('blocks.base')

@section('content')
  <div class="container">

    <form action="/block/update/css" method="POST">
      <input type="hidden" name="block_name" value="{{$block->name}}">
      {!! csrf_field() !!}
      <h3 class="card">Stylesheet</h3>
      <textarea id="{{$block->name}}css" class="txt-area-css" name="css" Placeholder="css goes here">
        @if($block->css)
          {{$block->css}}
        @endif
      </textarea>

      <link rel="stylesheet" href="{{URL::asset('assets/codemirror/lib/codemirror.css')}}">

      <script src="{{URL::asset('assets/codemirror/lib/codemirror.js')}}"></script>
      <script src="{{URL::asset('assets/codemirror/mode/css/css.js')}}"></script>
      <script>
        var editor = CodeMirror.fromTextArea({{$block->name}}css, {
          lineNumbers: true,
          mode: "css"
        });
      </script>
      <button class="btn btn-form btn-submit-css">Submit</button>
    </form>

  <hr>
  <form action="/b/{{$block->name}}/upload/image" method="POST" id="form-css-image" enctype="multipart/form-data">
    <h3 class="card t-center">Add Image</h3>
    @if($errors->has())
      @foreach($errors->all() as $error)
        <div class="error">
          <p>{{$error}}</p>
        </div>
      @endforeach
    @endif
    <ul class="list-down">
    <li><input class="input input-name" type="text" name="filename" Placeholder="Image name"></li>
    <li><input type="file" name="image" id="css-image"></li>
    {!! csrf_field() !!}
    <li><button class="btn btn-css-image">Upload</button></li>
  </form>
  <hr>
  <h3 class="card t-center">/b/{{$block->name}} Images</h3>
  @foreach($images as $image)
  <div class="css-image">
    <a href="{{$image->url}}"><img src="{{$image->thumbnail}}"></a>
    <p id="img-name-{{$image->id}}">{{$image->name}}</p>
    <button type="button" onclick="deleteimage({{$image->id}}, '{{$block->name}}')" class="btn btn-red">Delete</button>
  </div>
  @endforeach
  </div>
@endsection
