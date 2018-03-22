@extends('blocks.base')


@section('content')
  <h2 class="light card">{{$results->count()}} Search Results for '{{$query}}'</h2>
  @if($results->count() === 0)
    <h3 class="h-none">Nothing Posted Yet</h3>
  @else
    @foreach($results as $post)
        @if($post->type === 'self')
          @include('blocks.search.post_result_self')
        @else
          @include('blocks.search.post_result_link')
        @endif
    @endforeach
  @endif

  {!! $results->render() !!}

@endsection('content')
