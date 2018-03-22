<div class="container-post">
  <div class="post-head" style="background-color:{{$post->user->post_head_bg}}; color:{{$post->user->post_head_txt}}">
      <img class="post-avatar" src="{{$post->user->avatar_link}}">
      <div class="post-author">{{$post->user->name}}{{htmlspecialchars('@')}}{{$post->user->signature}}
      @if($post->user->verified === 1)<i class="fa fa-check"></i>@endif<br>
      Posted: {{$post->created_at}}</div>
  </div>

  <div class="post-body-preview">
      @if(strlen($post->textbody) > 1000)
      <?php $text = strip_tags($post->textbody, "<p><h1><h2><h3><h4><h5>");?>
      <?php $text = substr($text, 0, 1000); ?>
        {!! $text !!} ...<a href="/">read more.</a>
      @else
        {!! $post->textbody !!}
      @endif
  </div>

</div>
