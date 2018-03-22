@extends('blocks.search.post_result_base')

@section('post_content')
<div class="bp-title"><a href="{{$post->url}}">{{$post->title}}</a> <span class="bp-domain"> ({{$post->domain}})</span></div>
<div class="bp-author">Submitted by <a href="/u/{{$post->author}}">{{$post->author}}</a> @if(isset($block)) @else to <a href="/b/{{$post->block_name}}">/b/{{$post->block_name}}</a> @endif {{time_elapsed_string($post->created_at)}}</div>
@overwrite

@section('self')

@overwrite
