<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token" content="{{ csrf_token()}}" >
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    @if($block->title)
      <title>{{$block->title}}</title>
    @else
      <title>{{$block->name}}</title>
    @endif

    <link rel="icon" type="image/png" href="{{URL::asset('assets/images/favicon.png')}}" />
    <!-- Icons !-->
    <link rel="stylesheet" href="{{URL::asset('assets/font-awesome/css/font-awesome.css')}}" />


    <!-- Fonts !-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" />
    <!-- CSS !-->
    <link rel="stylesheet" href="{{URL::asset('assets/css/bantr.css')}}" />
    <!-- JS !-->
    <script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>
    <script src="{{URL::asset('assets/js/bantr.js')}}"></script>
        <link rel="stylesheet" type="text/css" href="{{$block->css_compiled}}" />
    @if(Auth::user())
      <?php $mod = $block->ismod($block->name); ?>
    @endif
    
</head>
