@foreach($items as $item) 
    <?php $class = str_replace("App\\", "", get_class($item)); ?>
    @if($class === "Block_Post") 
        <?php $post = $item; ?>
        @include('blocks.post.render_prev')
    @elseif($class === "Block_Post_Comment") 
        <?php $comment = $item; ?>
        @include('blocks.comment.queue', ['n' => null])
    @endif
@endforeach