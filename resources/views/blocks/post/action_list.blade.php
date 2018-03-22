@if(Auth::user())
<ul class="bp-action-list">

  <li><a  class="action-report" onclick="toggle_display('bp-report-{{$post->id}}')">Report</a></li>

    @if($post->author === Auth::user()->username)
      <li><a class="action-delete" onclick="toggle_display('bp-delete-{{$post->id}}')">Delete</a></li>
    @endif
  @endif
  @if(isset($mod))

    @if($mod->perms_posts === 1)
    <li><a class="action-remove" onclick="toggle_display('bp-remove-{{$post->id}}')">Remove</a></li>
    <li><a class="action-ban" onclick="toggle_display('bp-ban-{{$post->id}}')">Ban User</a></li>
    @endif

  <li><a href="/b/{{$post->block_name}}/p/{{$post->unique_id}}/cherry" class="action-cherry">Give Cherry</a></li>
</ul>
@endif
