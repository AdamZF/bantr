<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token" content="{{ csrf_token()}}" >

    <title>bantr</title>
      <link rel="icon" type="image/png" href="{{URL::asset('assets/images/favicon.png')}}">
    <!-- Icons !-->
    <link rel="stylesheet" href="{{URL::asset('assets/font-awesome/css/font-awesome.css')}}">

        {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <!-- CSS !-->
    <link rel="stylesheet" href="{{URL::asset('assets/css/bantr.css')}}">
    <!-- JS !-->
    <script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>
    <script src="{{URL::asset('assets/js/bantr.js')}}"></script>

    @if(Auth::user())
      <?php $counter = Auth::user()->counter; ?>
    @endif
    

</head>
