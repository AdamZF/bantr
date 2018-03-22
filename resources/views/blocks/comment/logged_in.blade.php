<ul class="comment-list">
<li><a class="comment-reply" onclick="toggle_display('reply-{{$comment->id}}')">Reply</a></li>
@if(isset($post))<li><a href="/b/{{$comment->block_name}}/comments/{{$post->unique_id}}/{{$post->slug}}/{{$comment->id}}">Permalink</a></li>@endif
@if(isset($n) && $n !== 1)<li> <a href="/b/{{$comment->block_name}}/comments/{{$post->unique_id}}/{{$post->slug}}/{{$comment->comment_parent}}">Parent</a></li>@endif
<li><a class="comment-report" onclick="toggle_display('creport-{{$comment->id}}')">Report</a></li>
@if(isset($mod)) 
  @if($mod->perms_comments === 1) 
    <li><a class="comment-get-reports" onclick="toggle_display('comment-remove-{{$comment->id}}')">Remove</a></li>
    @if($comment->reports > 0)<li><a onclick="fetchreports('comment', {{$comment->id}})">Reports {{$comment->reports}} </a></li>@endif
  @endif
@endif


@if($comment->author === Auth::user()->username)
  <li><a>Delete</a></li>
@endif
</ul>

<div class="comment-replier" id="reply-{{$comment->id}}" style="display: none">
  <hr>
<form onsubmit="comment_reply(this, '{{$comment->id}}')" class="comment-reply" action="/makecommentreply" method="POST">
  <textarea name="comment-text" id="comment-rtext-{{$comment->id}}"></textarea><br>
  <input name="parent" type="hidden" value="{{$comment->id}}">
  {!! csrf_field() !!}
  <button class="btn btn-green" type="button" onclick="rendertext('comment-rtext-{{$comment->id}}', 'crp-{{$comment->id}}')">Preview</button>
  <button class="btn btn-blue">Reply</button>
  <button class="btn btn-red fl-right" type="button" onclick="hide('reply-{{$comment->id}}')">Cancel</button>

  <div id="crp-{{$comment->id}}" class="preview-text"></div>
  
</form>

<div id="errors-{{$comment->id}}"></div>
</div>

<div class="comment-action-wrapper">
  <div class="comment-reporter" id="creport-{{$comment->id}}" style="display: none"> 
      <form onsubmit="report(this)" action="/makereport" method="POST">
      <input type="hidden" name="ref" value="{{$comment->id}}">
      <input type="hidden" name="type" value="comment">
      <input type="hidden" name="block_name" value="{{$comment->block_name}}">

      {!! csrf_field() !!}
      <div class="container-full">
              <a onclick="toggle_display('creport-{{$comment->id}}')" class="fl-right btn btn-red">Cancel X</a>
      <h3>Why are you reporting this? </h3>

      <select class="mt-15 select-wide" name="reason">Select a Reason
        <option value="nsfw">NSFW Content (untagged)</option>
        <option value="notbelong">Doesn't Belong</option>
        <option value="personal_info">Personal Information</option>
        <option value="other">Other (Specify Below)</option>n
      </select><br>
      <input type="text"  class="input-def mt-15 mb-15" name="user-comment" placeholder="Additional Comment">
    </div>
      <button type="submit" class="btn btn-blue">Submit</button>
    </form>
  </div>

  @if(isset($mod) && $mod->perms_comments === 1) 
    <div class="bp-reports" id="reports-comment-{{$comment->id}}"></div>
  @endif
  @include('blocks.moderation.comments.remove')
</div>