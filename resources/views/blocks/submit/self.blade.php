@extends('blocks.submit.base')

@section('content')
<div class="container">
<form class="block-post-form" id="block-self-post" action="/b/{{$block->name}}/submit_post" method="POST">
    <h1 class="h-tspaced light">New Self Post</h1>
    <h5 class="h-tspaced"><a href="/b/{{$block->name}}/submit/link">Did you want to submit a link instead?</a></h5>
<input class="txt-title" name="title" type="text" placeholder="Title"><br>
{!! csrf_field() !!}
<textarea class="txt-area-block-post" name="body" placeholder="body"></textarea>
<input type="hidden" value="self" name="type">
<hr><br>
<button type="submit" class="btn btn-blue">Submit</button>
<button type="button" class="btn btn-green fl-right" onclick="render('block-self-post', 'body', 'preview')">Preview</button>
</form>


<div id="preview" class="rendertext"></div>
</div>
@endsection
