@extends('blocks.search.post_result_base')
@section('post_content')
    <div class="bp-title"><a href="/b/{{$post->block_name}}/{{$post->unique_id}}/comments">{{$post->title}}</a>  <a href="{{$post->domain}}">{{$post->domain}}</a></div>
    <div class="bp-author">Submitted by <a href="/u/{{$post->author}}">{{$post->author}}</a> @if(isset($block)) @else to <a href="/b/{{$post->block_name}}">/b/{{$post->block_name}}</a> @endif {{time_elapsed_string($post->created_at)}}</div>
    @if($post->body)<button class="btn-expand-sp" onclick="expandpost('{{$post->unique_id}}', 'sp-{{$post->unique_id}}')"><i class="fa fa-navicon"></i></button>@endif

@overwrite

@section('self')
  <div id="sp-{{$post->unique_id}}" class="bp-self-preview" style="display: none;">

    </div>
@overwrite
