
@if($post->type === 'self')
  @include('notifications.preview_self')
@elseif($post->type === 'link')
  @include('notifications.preview_link')
@endif
