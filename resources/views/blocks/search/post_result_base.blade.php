<div class="bp-preview bp-self">
  <div class="bp-score">

  <a href="{{$post->url}}"><img class="bp-thumb" src="{{$post->thumbnail}}"></a>
  </div>

    <div class="bp-self-content">

    @yield('post_content')
    <ul class="bp-action-list">
      <li><a  class="action-comment" href="/bp/{{$post->unique_id}}">{{$post->comments}} Comments</a></li>
      <li><a  class="action-report" onclick="toggle_display('bp-report-{{$post->id}}')">Report</a></li>
      @if($post->author === Auth::user()->username)
        <li><a class="action-delete" onclick="toggle_display('bp-delete-{{$post->id}}')">Delete</a></li>
      @endif
      @if(isset($mod))
        @if($mod->perms_posts === 1)
        <li><a class="action-remove" onclick="toggle_display('bp-remove-{{$post->id}}')">Remove</a></li>
        <li><a class="action-ban" onclick="toggle_display('bp-ban-{{$post->id}}')">Ban User</a></li>
        @endif
      @endif
      <li><a href="/b/{{$post->block_name}}/p/{{$post->unique_id}}/cherry" class="action-cherry">Give Cherry</a></li>
    </ul>

    @yield('self')
    </div>

    <div class="bp-action-wrapper">
      <div id="bp-delete-{{$post->id}}" class="bp-action-delete" style="display: none;">
        <h3 class="light h-tspaced">Are you sure?</h3><br>
        <button type="submit" class="btn btn-red">Yes, Delete it <i class="fa fa-trash"></i></button>
        <button type="button" class="btn btn-blue">Cancel</button>
      </div>
      <div id="bp-report-{{$post->id}}" class="bp-action-report" style="display:none">
        <form onsubmit="report(this)" action="/reportbpost" method="POST">
          <input type="hidden" name="block_post" id="{{$post->id}}">
          <input type="hidden" name="block_name" id="{{$post->block_name}}">
          {!! csrf_field() !!}
          <div class="container-full">
                  <a onclick="toggle_display('bp-report-{{$post->id}}')" class="fl-right btn btn-red">Cancel X</a>
          <h3>Why are you reporting this? </h3>

          <select class="mt-15 select-wide"> name="reason">Select a Reason
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
