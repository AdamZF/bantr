

<div class="ban-user" id="bp-ban-{{$post->id}}" style="display: none">
  <form class="form-ban" onsubmit="sendform('banuser',this,'bp-ban-{{$post->id}}', null)" id="ban-form" action="/banuser" method="POST">
    {!! csrf_field() !!}
    <b>Username</b>:  {{$post->author}} <br><br>
    <input type="hidden" name="username" value="{{$post->author}}">
    <b>Ban length</b>: <input type="number" name="length"> Days (leave empty for permaban)<br><br>
    <input type="hidden" name="block" value="{{$post->block_name}}">
    <h4>Reason:</h4> <br>
    <textarea name="reason"></textarea><br>
    <button type="submit" class="btn btn-red">B A N</button>
    <button type="button" class="btn btn-blue fl-right" onclick="toggle_display('bp-ban-{{$post->id}}')">Cancel</button>
  </form>
</div>


