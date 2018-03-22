@include('headers.block_mod_header')
<body id="block_moderation">

@include('nav.default_nav')

<div class="container">
  <h1 class="light heading-blue t-center"><a class="a-std" href="/b/{{$block->name}}">/b/{{$block->name}}</a> administration </h1>
  <h2 class="light">Mod List</h2>
  <hr>
<div class="of-x">
<table class="mod-table">
<tr>
  <th>Username</th>
  <th>Rank</th>
  <th>Permissions</th>
</tr>

@foreach($mods as $mod)
  <tr>
    <td>{{$mod->modinfo->username}}</td>
    <td>
      @if($mod->rank === 1)
        Owner (1)
      @else
        {{$mod->rank}}
      @endif</td>
    <td>
        @if($mod->perms_full === 1)
          <i>Full Permissions</i>
        @else
          @if($mod->perms_mail)Mail -@endif
          @if($mod->perms_settings) Settings -@endif
          @if($mod->perms_css) CSS -@endif
          @if($mod->perms_ban) Ban -@endif
          @if($mod->perms_sticky) Sticky -@endif
        @endif
    </td>
  </tr>
@endforeach

</table>
</div>

@if(Auth::user()->block_mod($block->id)->perms_full === 1)
<h2 class="light h-tspaced">Edit Permissions</h2>
<hr>
<div class="of-x">
<table class="mod-table">
<tr>
  <th>Username</th>
  <th>Rank</th>
  <th>Full</th>
  <th>Mail</th>
  <th>Settings</th>
  <th>CSS</th>
  <th>Stickies</th>
  <th>Posts</th>
  <th>Comments</th>
  <th>Ban</th>
  <th></th>
</tr>
 @foreach($mods as $mod)
<?php $urank = Auth::user()->block_mod($block->id)->rank ?>
   @if($mod->rank > $urank)
      <tr>
          <td>{{$mod->modinfo->username}}</td>
          <td>{{$mod->rank}}</td>
        <form action="/block/updateperms" method="POST">
          <td><input type="checkbox" name="full" @if($mod->perms_full === 1) checked @endif value="full"></td>
          <td><input type="checkbox" name="mail" @if($mod->perms_mail === 1) checked @endif value="mail"></td>
          <td><input type="checkbox" name="settings" @if($mod->perms_settings === 1) checked @endif value="settings"></td>
          <td><input type="checkbox" name="css" @if($mod->perms_css === 1) checked @endif value="css"></td>
          <td><input type="checkbox" name="stickies" @if($mod->perms_sticky === 1) checked @endif value="stickies"></td>
          <td><input type="checkbox" name="posts" @if($mod->perms_posts === 1) checked @endif value="posts"></td>
          <td><input type="checkbox" name="comments" @if($mod->perms_comments === 1) checked @endif value="comments"></td>
          <td><input type="checkbox" name="ban" @if($mod->perms_ban === 1) checked @endif value="ban"></td>
          <td><button type="submit" class="btn btn-blue">Update</button></td>
          {!! csrf_field() !!}
          <input type="hidden" name="username" value="{{$mod->modinfo->username}}">
          <input type="hidden" name="block_name" value="{{$block->name}}">
        </form>
      </tr>
   @endif
 @endforeach
</table>
</div>
@endif


@if(Auth::user()->block_mod($block->id)->perms_full === 1)
   <h2 class="h-tspaced light">Remove Moderators</h2>
   <hr>
   <div class="of-x">
   <table class="mod-table">
   @foreach($mods as $mod)
     @if($mod->rank > $urank)
      <tr><td>{{$mod->modinfo->username}}</td>
        <td><button id="rm-btn-{{$mod->id}}" class="btn btn-red" onclick="toggle_display('rm-mod-{{$mod->id}}');toggle_display('rm-btn-{{$mod->id}}')">Remove</button>
          <form style="display:none;" id="rm-mod-{{$mod->id}}" action="/block/removemod" method="POST">
            {!! csrf_field() !!}
            <input type="hidden" name="block" value="{{$block->id}}">
            <button type="button" onclick="toggle_display('rm-mod-{{$mod->id}}');toggle_display('rm-btn-{{$mod->id}}')" class="btn btn-red">Cancel</button>
            <input type="hidden" name="mod" value="{{$mod->id}}">
            <button type="submit" class="btn btn-blue">Confirm</button>
          </form>
      @endif
   @endforeach
 </table>
 </div>

 <h2 class="h-tspaced light">Add Moderators</h2>
<hr>
 <div class="of-x">
 <table class="mod-table">
 <tr>
   <th>Username</th>
   <th>Full</th>
   <th>Mail</th>
   <th>Settings</th>
   <th>CSS</th>
   <th>Stickies</th>
   <th>Posts</th>
   <th>Comments</th>
   <th>Ban</th>
   <th></th>
 </tr>
       <tr>
            <form action="/block/addmod" method="POST">
           <td><input class="i-txt-def" type="text" name="new-mod-name"></td>
           <td><input type="checkbox" name="full" value="full"></td>
           <td><input type="checkbox"  name="mail" value="mail"></td>
           <td><input type="checkbox" name="settings" value="settings"></td>
           <td><input type="checkbox" name="css" value="css"></td>
           <td><input type="checkbox" name="stickies" value="stickies"></td>
           <td><input type="checkbox" name="posts" value="posts"></td>
           <td><input type="checkbox" name="comments" value="comments"></td>
           <td><input type="checkbox" name="ban" value="ban"></td>
           <td><button type="submit" class="btn btn-blue">Invite</button></td>
           {!! csrf_field() !!}
           <input type="hidden" name="block_name" value="{{$block->name}}">
           <input type="hidden" name="block" value="{{$block->id}}">
         </form>
       </tr>
 </table>
 </div>

<h2 class="h-tspaced light">Invited / Edit Invites</h2>
<hr>

<div class="of-x">
<table class="mod-table">
<tr>
  <th>Username</th>
  <th>Full</th>
  <th>Mail</th>
  <th>Settings</th>
  <th>CSS</th>
  <th>Stickies</th>
  <th>Posts</th>
  <th>Comments</th>
  <th>Ban</th>
  <th></th>
  <th></th>
</tr>
 @foreach($invites as $invite)

      <tr>
          <td>{{$invite->username}}</td>
        <form action="/block/updateperms" method="POST">
          <td><input type="checkbox" name="full" @if($invite->perms_full === 1) checked @endif value="full"></td>
          <td><input type="checkbox" name="mail" @if($invite->perms_mail === 1) checked @endif value="mail"></td>
          <td><input type="checkbox" name="settings" @if($invite->perms_settings === 1) checked @endif value="settings"></td>
          <td><input type="checkbox" name="css" @if($invite->perms_css === 1) checked @endif value="css"></td>
          <td><input type="checkbox" name="stickies" @if($invite->perms_stickies === 1) checked @endif value="stickies"></td>
          <td><input type="checkbox" name="posts" @if($invite->perms_posts === 1) checked @endif value="posts"></td>
          <td><input type="checkbox" name="comments" @if($invite->perms_comments === 1) checked @endif value="comments"></td>
          <td><input type="checkbox" name="ban" @if($invite->perms_bans === 1) checked @endif value="ban"></td>
          <td><button type="submit" class="btn btn-blue">Update</button></td>
          {!! csrf_field() !!}
          <input type="hidden" name="username" value="{{$invite->username}}">
          <input type="hidden" name="block_name" value="{{$invite->block_name}}">
        </form>
          <form action="/block/removeinvite" method="POST">
            {!! csrf_field() !!}
              <td><button class="btn btn-red">Delete Invite</button></td>

          </form>
      </tr>
 @endforeach
</table>
</div>

@endif
<hr>
@include('footers.default')
