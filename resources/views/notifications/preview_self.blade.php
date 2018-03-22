<div class="bp-preview bp-self">
  <div class="bp-score">
    <ul>
    @if(Auth::user())
      @if($post->upvoted)
          <li><button id="bp-upvoted-{{$post->id}}" onclick="bp_upvote(this)" data-block="{{$post->block_name}}" data-post-id="{{$post->id}}" class="bp-vote bp-vote-up bp-upvoted"><i class="bp-arrow-up fa fa-chevron-up"></i></button></li>
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
  <div class="bp-thumb"><img src="{{URL::asset('assets/images/self_post.png')}}"></div>
  </div>
    <div class="bp-self-content">
    <div class="bp-title"><a href="/b/{{$post->block_name}}/comments/{{$post->unique_id}}/{{$post->slug}}">{{$post->title}}</a>  <a href="{{$post->domain}}">{{$post->domain}}</a></div>
    <div class="bp-author">Submitted by <a href="/u/{{$post->author}}">{{$post->author}}</a> @if(isset($block)) @else to <a href="/b/{{$post->block_name}}">/b/{{$post->block_name}}</a> @endif {{time_elapsed_string($post->created_at)}}</div>
    @if($post->body)<button class="btn-expand-sp" onclick="expandpost('{{$post->unique_id}}', 'sp-{{$post->unique_id}}')"><i class="fa fa-navicon"></i></button>@endif
    <ul class="bp-action-list">
      <li><a  class="action-comment" href="/b/{{$post->block_name}}/comments/{{$post->unique_id}}/{{$post->slug}}">{{$post->comments}} Comments </a></li>
      <li><a  class="action-report" onclick="toggle_display('bp-report-{{$post->id}}')">Report</a></li>
      <li><a class="action-delete" >Delete</a></li>
    </ul>
    <div id="sp-{{$post->unique_id}}" class="bp-self-preview" style="display: none;">

    </div>

    @include('notifications.replies')

    </div>

</div>
