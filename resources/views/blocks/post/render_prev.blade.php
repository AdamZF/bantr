@if($post->type === 'self')
  @include('blocks.post.preview_self')
@elseif($post->type === 'link')
  @include('blocks.post.preview_link')
@endif
