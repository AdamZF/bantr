@extends('blocks.base')


@section('content')

@if($bans->count() > 0)

@else
  <h2 class="heading-blue">Congrats! you haven't banned anyone yet!</h2>
@endif
<div class="container">
@if($bans->count() > 0)
  <h3 class="card">Add another Ban</h3>
@else
  <h3 class="card light">You can change that by banning someone, swing that hammer!</h3>
@endif

<hr>

  <form class="form-ban" onsubmit="ban_user(this)" id="ban-form">
    {!! csrf_field() !!}
    <h2 class="light">Username:</h2>
    <input type="text" name="username"><br><br>
    <h2 class="light">Ban length</h2>
    <input type="number" name="length"> Days (leave empty for permaban)<br><br>
    <input type="hidden" name="block" value="{{$block->name}}">
    <h2 class="light">Reason:</h2>
    <textarea name="reason"></textarea><br>
    <button type="submit" class="btn btn-red">B A N</button>
  </form>
<hr>
<h2 class="h-tspaced light">Bans</h2>
@if($bans->count() > 0)
    <table class="mod-table" id="banlist">
    <tr>
    <th>Username</th>
    <th>Ending</th>
    <th>Banned By</th>
    <th></th>
    </tr>
    @foreach($bans as $ban)
      @include('blocks.moderation.obj.ban')
    @endforeach

    </table>
@else
  <p id="nobans">Empty, Feels Good</p>
@endif

</div>
@endsection
