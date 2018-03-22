<div class="bp-preview bp-self">
  <div class="bp-score">
    <ul>
    @if(Auth::user())
      @if($post->upvoted)
          <li><button id="bp-upvoted-{{$post->id}}" onclick="bp_upvote(this)" data-block="{{$post->block_name}}" data-post-id="{{$post->unique_id}}" class="bp-vote bp-vote-up bp-upvoted"><i class="bp-arrow-up fa fa-chevron-up"></i></button></li>
          <li><span class="bp-preview-score" id="bp-preview-score-{{$post->id}}">{{$post->score}}</span></li>
          <li><button data-block="{{$post->block_name}}" data-post-id="{{$post->id}}" onclick="bp_downvote(this)" class="bp-vote bp-vote-down"><i class="bp-arrow-down fa fa-chevron-down"></i></button></li>
      @else
          <li><button onclick="bp_upvote(this)" data-block="{{$post->block_name}}" data-post-id="{{$post->id}}" class="bp-vote bp-vote-up"><i class="bp-arrow-up fa fa-chevron-up"></i></button></li>
          <li><span class="bp-preview-score" id="bp-preview-score-{{$post->id}}">{{$post->score}}</span></li>
          <li><button data-block="{{$post->block_name}}" data-post-id="{{$post->id}}" onclick="bp_downvote(this)" class="bp-vote bp-vote-down"><i class="bp-arrow-down fa fa-chevron-down"></i></button></li>
      @endif
    @else
      <li><button onclick="bp_upvote(this)" data-block="{{$post->block_name}}" data-post-id="{{$post->id}}" class="bp-vote bp-vote-up"><i class="bp-arrow-up fa fa-chevron-up"></i></button></li>
      <li><span class="bp-preview-score" id="bp-preview-score-{{$post->id}}">{{$post->score}}</span></li>
      <li><button data-block="{{$post->block_name}}" data-post-id="{{$post->id}}" onclick="bp_downvote(this)" class="bp-vote bp-vote-down"><i class="bp-arrow-down fa fa-chevron-down"></i></button></li>
    @endif
  </ul>
  <img class="bp-thumb" src="{{URL::asset('assets/images/self_post.png')}}">
  </div>

    <div class="bp-self-content">
    <div class="bp-title"><a href="/b/{{$post->block_name}}/{{$post->unique_id}}/comments">{{$post->title}}</a>  <span class="post_domain">{{$post->domain}}</span>
     @if($post->status !== "normal"){{$post->status}}@endif</div>
    <div class="bp-author">Submitted by <a href="/u/{{$post->author}}">{{$post->author}}</a>  {{time_elapsed_string($post->created_at)}}</div>

    <div id="sp-{{$post->unique_id}}" class="bp-self-display" >
      {!! $post->body_compiled !!}
    </div>

  @include('blocks.post.action_list')
    </div>
<!--    <div class="bp-action-list-wrapper">
          <ul class="bp-action-list">
            <li><a  class="action-comment" onclick="toggle_display('bp-comment-{{$post->id}}')">Comment</a></li>
            <li><a  class="action-report" onclick="toggle_display('bp-report-{{$post->id}}')">Report</a></li>
            <li><a class="action-delete" >Delete</a></li>
            <li><a class="action-remove" >Remove</a></li>
            <li><a class="action-cherry">Give Cherry</a></li>
          </ul>
    </div> !-->
    <div class="bp-action-wrapper">
      <div id="bp-report-{{$post->id}}" class="bp-action-report" style="display:none">
        <form onsubmit="report(this)" action="/reportbpost" method="POST">
          <input type="hidden" name="block_post" id="{{$post->id}}">
          <input type="hidden" name="block_name" id="{{$post->block_name}}">
          {!! csrf_field() !!}
          <div class="container-full">
                  <a onclick="toggle_display('bp-report-{{$post->id}}')" class="fl-right btn btn-red">Cancel X</a>
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
      <div id="bp-comment-{{$post->id}}" class="bp-action-comment" style="display:none">
        <form action="/makecomment" method="POST">
          <input type="hidden" name="block_post" value="{{$post->id}}">
          <input type="hidden" name="block_name" value="{{$post->block_name}}">
          {!! csrf_field() !!}
          <textarea class="txt-area txt-area-comment"></textarea>
          <button type="submit" class="btn btn-comment">Submit</button>
        </form>
      </div>
      <div id="bp-comment-{{$post->id}}" class="bp-action-cherry" style="display:none"></div>

      @if(Auth::user())
        @if(isset($mod))
          @if($mod->perms_posts === 1)
            @include('blocks.moderation.actions.remove')
          @endif

          @if($mod->perms_ban === 1)
            @include('blocks.moderation.actions.ban_user')
          @endif
        @endif
      @endif
      
    </div>
</div>
