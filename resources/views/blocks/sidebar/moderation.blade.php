<div class="b-sidebar-moderation">
  <h4 class="t-center light">Moderation</h4>
  <ul>
    @if($mod->perms_settings === 1)<li><i class="fa fa-cogs"></i><a href="/b/{{$block->name}}/mod/sidebar">  Edit Sidebar</a></li>@endif
    @if($mod->perms_settings === 1)<li><i class="fa fa-file-text"></i><a href="/b/{{$block->name}}/mod/description">  Edit Description/Title</a></li>@endif
    @if($mod->perms_css === 1)<li><i class="fa fa-desktop"></i><a  href="/b/{{$block->name}}/mod/css">  Edit CSS</a></li>@endif
    @if($mod->perms_ban === 1)<li><i class="fa fa-crosshairs"></i><a  href="/b/{{$block->name}}/mod/bans">  Bans</a></li>@endif
    @if($mod->perms_admin === 1)<li><i class="fa fa-users"></i><a href="/b/{{$block->name}}/mod/admin">  Manage Mods</a></li>@endif
    @if($mod->perms_posts === 1 || $mod->perms_comments === 1)<li><i class="fa fa-list"></i><a href="/b/{{$block->name}}/mod/queue">  Modqueue</a></li>@endif
    @if($mod)<li><i class="fa fa-book"></i><a href="/b/{{$block->name}}/modlog"> Mod-Log</a></li>@endif
  </ul>
</div>
