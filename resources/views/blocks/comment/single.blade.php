<div class="comment-wrapper">
  <div class="bp-score">
  <ul>
  @if(Auth::user())
    @if($comment->upvoted)
        <li><button id="bp-upvoted-{{$comment->unique_id}}" onclick="bp_upvote_c(this)" data-block="{{$comment->block_name}}" data-post-id="{{$comment->unique_id}}" class="bp-vote bp-vote-up bp-upvoted"><i class="bp-arrow-up fa fa-chevron-up"></i></button></li>
        <li><span class="bp-preview-score" id="bp-preview-score-{{$comment->unique_id}}">{{$comment->score}}</span></li>
        <li><button data-block="{{$comment->block_name}}" data-post-id="{{$comment->unique_id}}" onclick="bp_downvote(this)" class="bp-vote bp-vote-down"><i class="bp-arrow-down fa fa-chevron-down"></i></button></li>
    @else
        <li><button onclick="bp_upvote_c(this)" data-block="{{$comment->block_name}}" data-post-id="{{$comment->unique_id}}" class="bp-vote bp-vote-up"><i class="bp-arrow-up fa fa-chevron-up"></i></button></li>
        <li><span class="bp-preview-score" id="bp-preview-score-{{$comment->unique_id}}">{{$comment->score}}</span></li>
        <li><button data-block="{{$comment->block_name}}" data-post-id="{{$comment->unique_id}}" onclick="bp_downvote(this)" class="bp-vote bp-vote-down"><i class="bp-arrow-down fa fa-chevron-down"></i></button></li>
    @endif
  @else
    <li><button onclick="bp_upvote_c(this)" data-block="{{$comment->block_name}}" data-post-id="{{$comment->unique_id}}" class="bp-vote bp-vote-up"><i class="bp-arrow-up fa fa-chevron-up"></i></button></li>
    <li><span class="bp-preview-score" id="bp-preview-score-{{$comment->unique_id}}">{{$comment->score}}</span></li>
    <li><button data-block="{{$comment->block_name}}" data-post-id="{{$comment->unique_id}}" onclick="bp_downvote(this)" class="bp-vote bp-vote-down"><i class="bp-arrow-down fa fa-chevron-down"></i></button></li>
  @endif
</ul>
</div>

<a href="/u/{{$comment->author}}">{{$comment->author}}</a> {{time_elapsed_string($comment->created_at)}}
<div class="comment-text">
  {!! $comment->text_compiled !!}
</div>

@if(Auth::user())
  @include('blocks.comment.logged_in')
@elseif(Auth::guest())
  @include('blocks.comment.guest')
@endif

<div id="reply-return-{{$comment->id}}">
</div>

</div>
