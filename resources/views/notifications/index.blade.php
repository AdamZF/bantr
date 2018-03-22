@include('headers.default_header')
  @include('blocks.menu.block_menu')
      @include('nav.nav_small')
<div class="container">
<h1 class="light h-tspaced">Notifications</h1>
@if($mod_invites->count() > 0)
  <h2 class="card card-green h-tspaced light t-center">Mod Invites</h2>
  @foreach($mod_invites as $invite)
    @include('notifications.mod_invite')
  @endforeach
@endif
@if($notifications->count() > 0)<h2 class="card card-blue h-tspaced light t-center">Replies</h2>@endif
  @if($notifications->count() === 0)
    <h2 class="h-none">No notifications to show</h2>
  @endif

  @foreach($notifications as $notification)
    <?php $t = $notification->type ?>
    @if($t === "block_comment_reply")

    @elseif($t === "block_post_reply")

      @include('notifications.post_reply')

    @endif

  @endforeach

{!! $notifications->render() !!}

</div>
@include('footers.default')
