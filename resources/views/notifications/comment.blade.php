
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

<a href="/u/{{$comment->submitter->username}}">{{$comment->submitter->username}}</a> {{time_elapsed_string($comment->created_at)}}
<div class="comment-text">
  {!! $comment->text_compiled !!}
</div>

  @include('blocks.comment.logged_in')

<div id="reply-return-{{$comment->id}}">
</div>

<div id="reply-{{$comment->id}}" style="display: none">
  <hr>
<form onsubmit="comment_reply(this, 'reply-return-{{$comment->id}}')" class="comment-reply" action="/makecommentreply" method="POST">
<textarea name="comment-text"></textarea><br>
<input name="parent" type="hidden" value="{{$comment->id}}">
{!! csrf_field() !!}
<button class="btn btn-blue">Reply</button>
</form>

<div id="errors-{{$comment->id}}"></div>
</div>
</div>
