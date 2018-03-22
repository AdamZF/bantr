@if(isset($post))
    <ul class="comment-list">
    <li><a href="/b/{{$comment->block_name}}/comments/{{$post->unique_id}}/{{$post->slug}}/{{$comment->id}}">Permalink</a></li>
    @if(isset($n) && $n !== 1)<li><a href="/b/{{$comment->block_name}}/comments/{{$post->unique_id}}/{{$post->slug}}/{{$comment->comment_parent}}">Parent</a></li>@endif
    </ul>
@endif