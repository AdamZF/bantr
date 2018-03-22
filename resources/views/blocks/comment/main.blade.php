
<div @if(isset($n)) class="comment-wrapper tier-{{$n}} " @else class="comment-wrapper" @endif>
  
  @if(isset($post))

  @else 
  <?php $post = $comment->parent_post; ?>
  @endif 

    <div class="comment @if(isset($permalink))permalinked<?php $permalink = null ?> @endif">
    <div class="bp-score">
    <ul>

    @if(Auth::user())

    <?php $vote = $comment->voted; ?>

    <li><button id="comment-upvote-{{$comment->id}}" onclick="vote(this)" data-item-type="comment" data-vote-type="upvote" data-post-id="{{$comment->id}}" class="bp-vote bp-vote-up @if($vote && $vote->type === 'upvote') comment-upvoted @endif"><i class="bp-arrow-up fa fa-chevron-up"></i></button></li>
    <li><span class="bp-preview-score" id="comment-preview-score-{{$comment->id}}">{{$comment->score}}</span></li>
    <li><button id="comment-downvote-{{$comment->id}}" data-vote-type="downvote" data-item-type="comment" data-post-id="{{$comment->id}}" onclick="vote(this)" class="bp-vote bp-vote-down @if($vote && $vote->type === 'downvote') comment-downvoted @endif "><i class="bp-arrow-down fa fa-chevron-down"></i></button></li>

    @else
      <li><button onclick="loginrequired()" class="bp-vote bp-vote-up"><i class="bp-arrow-up fa fa-chevron-up"></i></button></li>
      <li><span class="bp-preview-score" id="comment-preview-score-{{$comment->id}}">{{$comment->score}}</span></li>
      <li><button onclick="loginrequired()" class="bp-vote bp-vote-down"><i class="bp-arrow-down fa fa-chevron-down"></i></button></li>
    @endif
  </ul>
  </div>

  <div class="comment-main">
  <a class="comment-author" href="/u/{{$comment->author}}">{{$comment->author}}</a> <span class="comment-time">{{time_elapsed_string($comment->created_at)}}</span>
  <div class="comment-text" >
    {!! $comment->text_compiled !!}
  </div>

  @if(Auth::user())
    @include('blocks.comment.logged_in')
  @elseif(Auth::guest())
    @include('blocks.comment.guest')
  @endif

  </div>

@if(isset($mod))
  @if($mod->perms_comments === 1)
    @include('blocks.comment.moderation')
  @endif
@endif
<div id="reply-return-{{$comment->id}}">
</div>


  @foreach($comment->comment_reply as $comment)
    @include('blocks.comment.main', [ 'n' => $n + 1])
  @endforeach

</div>
</div>