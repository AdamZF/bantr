<div class="container-full preview-replies">

  @foreach($post->ttreply($notification->unseen) as $comment)
    @include('notifications.comment')
  @endforeach
<div id="show-more-{{$post->id}}">
</div>
</div>
