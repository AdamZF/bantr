<div class="bp-preview bp-self">
  <div class="bp-score">
    <ul>
    @if(Auth::user())

    <?php $vote = $post->voted; ?>
    <li><button id="bp-upvote-{{$post->id}}" onclick="vote(this)" data-item-type="post" data-vote-type="upvote" data-post-id="{{$post->id}}" class="bp-vote bp-vote-up @if(isset($vote) && $vote->type === 'upvote') bp-upvoted @endif"><i class="bp-arrow-up fa fa-chevron-up"></i></button></li>
    <li><span class="bp-preview-score" id="bp-preview-score-{{$post->id}}">{{$post->score}}</span></li>
    <li><button id="bp-downvote-{{$post->id}}" data-vote-type="downvote" data-item-type="post" data-post-id="{{$post->id}}" onclick="vote(this)" class="bp-vote bp-vote-down @if(isset($vote) && $vote->type === 'downvote') bp-downvoted @endif "><i class="bp-arrow-down fa fa-chevron-down"></i></button></li>

    @else
      <li><button onclick="loginrequired()" class="bp-vote bp-vote-up"><i class="bp-arrow-up fa fa-chevron-up"></i></button></li>
      <li><span class="bp-preview-score" id="bp-preview-score-{{$post->id}}">{{$post->score}}</span></li>
      <li><button onclick="loginrequired()" class="bp-vote bp-vote-down"><i class="bp-arrow-down fa fa-chevron-down"></i></button></li>
    @endif
  </ul>
  <a href="{{$post->url}}"><img class="bp-thumb" @if($post->type === "link") src="{{$post->thumbnail}}" @else src="{{URL::asset('assets/images/self_post.png')}}" @endif></a>
  </div>


    <div class="bp-self-content">

    @yield('post_content')
    <ul class="bp-action-list">
      <li><a  class="action-comment" href="/b/{{$post->block_name}}/comments/{{$post->unique_id}}/{{$post->slug}}">{{$post->comments}} Comments</a></li>
      @if(Auth::user())
              <li><a  class="action-report" onclick="toggle_display('bp-report-{{$post->id}}')">Report</a></li>
        @if($post->author === Auth::user()->username)
          <li><a class="action-delete" onclick="toggle_display('bp-delete-{{$post->id}}')">Delete</a></li>
          @if($post->type === "self")<li><a class="action-edit" onclick="editpost({{$post->id}})">Edit</a></li>@endif
        @endif
      @endif
      @if(isset($mod))
        @if($mod->perms_posts === 1)
        <li><a class="action-remove" onclick="toggle_display('bp-remove-{{$post->id}}')">Remove</a></li>
        <li><a class="action-ban" onclick="toggle_display('bp-ban-{{$post->id}}')">Ban User</a></li>
        @if($post->reports > 0)<li><a class="view-reports" onclick="fetchreports('post', '{{$post->id}}')">Reports {{$post->reports}} </a></li>@endif
        @endif
      @endif

    </ul>

    @yield('self')
    @yield('link')
    </div>



    <div class="bp-action-wrapper">
    @if(Auth::user()) 
      @if(Auth::user()->username === $post->author) 
        <div id="bp-delete-{{$post->id}}" class="bp-action-delete" style="display: none;">
          <h3 class="light h-tspaced">Are you sure?</h3><br>
          <form method="POST" action="/deletepost" onsubmit="deletepost(this)">
            {!! csrf_field() !!}
            <input type="hidden" name="post" value="{{$post->id}}">
            <input type="hidden" name="block" value="{{$post->block_name}}">
            <button type="submit" class="btn btn-red">Yes, Delete it <i class="fa fa-trash"></i></button>
            <button type="button" class="btn btn-blue" onclick="hide('bp-delete-{{$post->id}}')">Cancel</button>
          </form>
        </div>
      @endif

      <div id="bp-report-{{$post->id}}" class="bp-action-report" style="display:none">
        <form onsubmit="report(this)" action="/makereport" method="POST">
          <input type="hidden" name="ref" value="{{$post->id}}">
          <input type="hidden" name="type" value="post">
          <input type="hidden" name="block_name" value="{{$post->block_name}}">
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
          @endif

  @if(Auth::user())
    @if(isset($mod))
      @if($mod->perms_posts === 1)
        @include('blocks.moderation.actions.remove')
        <div id="reports-post-{{$post->id}}" class="bp-reports"></div>
      @endif

      @if($mod->perms_ban === 1)
        @include('blocks.moderation.actions.ban_user')
      @endif
    @endif
  @endif
  </div>
</div>
