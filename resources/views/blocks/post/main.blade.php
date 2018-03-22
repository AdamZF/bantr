@extends('blocks.base')


@section('content')


@include('blocks.post.render_prev')

<div class="comments">
@include('blocks.comment.make_comment')
<div id="user_comment">
  @if(session('comment'))
    <?php $comment = session('comment') ?>
    {!! $comment->text_compiled !!}
  @endif
  @if($comments->count() === 0)
    <h2 class="light h-none">No comments....yet</h2>
  @endif

</div>



@foreach($comments as $comment)
  @include('blocks.comment.main', ['n' => 1])
@endforeach

</div>

@endsection
