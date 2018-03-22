@extends('user.profile.base')

@section('content')

<div class="container-full">

  <h1 class="light h-tspaced card">{{$user->username}}</h1>
  <hr>
  <div class="bl-9 bl-md-9 bl-sm-12">
    <div class="bl-6 bl-md-6 bl-sm-12">
      <h2 class="light h-tspaced card">Recent Posts</h2>
      <hr>
      @if($posts->count() === 0)
        <h3 class="light card h-none">No Posts from this user....yet</h3>
      @else
      @foreach($posts as $post)
        @include('blocks.post.render_prev', ['ismod' => null])
      @endforeach
      <a class="link-more" href="/u/{{$user->username}}/posts">See All Posts</a>
      @endif
    </div>

    <div class="bl-6 bl-md-6 bl-sm-12">
      <h2 class="light h-tspaced card">Recent Comments</h2>
      <hr>
      @if($comments->count() === 0)
        <h3 class="light card h-none">No comments from this user...yet</h3>
      @else
      @foreach($comments as $comment)
        @include('blocks.comment.single', ['ismod' => null])
      @endforeach
      <a class="link-more" href="/u/{{$user->username}}/comments">See All Comments</a>
      @endif
    </div>

  </div>

  <div class="bl-3 bl-md-3 bl-sm-12 profile-mod-tab">
    @if($mods->count() > 0)
      <h3 class="light h-tspaced card"><strong>User Moderates the Following Blocks:</strong></h3>
      <ul>
        @foreach($mods as $mod)
          <li><a href="/b/{{$mod->block_name}}">{{$mod->block_name}}</a></li>
        @endforeach
      </ul>
    @endif
  </div>
</div>
@endsection
