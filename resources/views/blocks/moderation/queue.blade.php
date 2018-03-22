@extends('blocks.base') 

@section('content') 
<h1 class="card light t-center card-blue">/b/{{$block->name}} Modqueue </h1>
<div class="modqueue">
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



    <div id="paginate-append"></div>

      <button onclick="loadnext()" id="load-next">LoadNextPage</button>
      <span id="paginate-next-page" data-next="/b/{{$block->name}}/mod/queue?page=2"></span>


</div>

@endsection