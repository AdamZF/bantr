@extends('blocks.post.preview_base')
@section('post_content')
    <div class="bp-title"><a href="/b/{{$post->block_name}}/comments/{{$post->unique_id}}/{{$post->slug}}">{{$post->title}}</a>  <span class="post_domain">{{$post->domain}}</span>
     @if($post->status !== "normal")<br><b><span class="error">{{$post->status}}</span></b>@endif</div>
    <div class="bp-author">Submitted by <a href="/u/{{$post->author}}">{{$post->author}}</a> @if(isset($block)) @else to <a href="/b/{{$post->block_name}}">/b/{{$post->block_name}}</a> @endif {{time_elapsed_string($post->created_at)}}</div>
    @if($post->body)<button class="btn-expand-sp" onclick="expandpost('{{$post->unique_id}}', 'sp-{{$post->unique_id}}')"><i class="fa fa-navicon"></i></button>@endif

@overwrite

@section('self')
  <div id="sp-{{$post->unique_id}}" class="bp-self-preview" style="display: none;">

    </div>
    <div id="post-editor-{{$post->id}}" class="bp-edit"></div>
@overwrite
