@extends('blocks.post.preview_base')

@section('post_content')
<div class="bp-title"><a href="{{$post->url}}">{{$post->title}}</a> <span class="bp-domain"> ({{$post->domain}})</span></div>
<div class="bp-author">Submitted by <a href="/u/{{$post->author}}">{{$post->author}}</a> @if(isset($block)) @else to <a href="/b/{{$post->block_name}}">/b/{{$post->block_name}}</a> @endif {{time_elapsed_string($post->created_at)}}</div>

@if($post->link_type === "youtube")
<button class="btn-video" onclick="load_yt(this)" data-post="{{$post->id}}" data-link="{{$post->url}}"><i class="fa fa-play"></i></button>
@endif
@overwrite

@section('self')

@overwrite

@section('link')

@if($post->link_type === "youtube")

  <div class="iframe-container" id="yt-{{$post->id}}" >
  </div>

@endif
@overwrite
