
@if($post->type === 'self')
  @include('blocks.search.post_result_self')
@else
  @include('blocks.search.post_result_link')
@endif
