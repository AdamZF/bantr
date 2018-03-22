@extends('blocks.base') 


@section('content')
<div class="container-full">
<h1 class="card card-blue light"><i class="fa fa-book"></i>  /b/{{$block->name}} ModLog </h1>
@if($items->count() === 0) 
    <h2 class="h-none">Nothing Logged Yet</h2>
@endif

@foreach($items as $item) 
    {{dd($item)}}
@endforeach 
{{dd($items[1])}}
</div>
@endsection