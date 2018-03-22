@extends('blocks.base')


@section('content')


@include('blocks.post.render_prev')

<div class="comments">

 @include('blocks.comment.main', ['n' => 1, 'permalink' => true])

</div>

@endsection
