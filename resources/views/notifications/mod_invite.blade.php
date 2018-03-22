

<div class="mod-invite">
    <h3>You have been invited to moderate <a href="/b/{{$invite->inv->block_name}}">/b/{{$invite->inv->block_name}}</a></h3>
    <ul><li><form method="POST" action="/modinvresponse">{!! csrf_field() !!}
        <input type="hidden" name="id" value="{{$invite->inv->id}}">
        <input type="hidden" name="block_name" value="{{$invite->inv->block_name}}">
        <input type="hidden" name="notif" value="{{$invite->id}}">
        <input type="hidden" name="response" value="yes">
        <button class="btn btn-blue">Accept</button>
      </form></li>

      <li><form method="POST" action="/modinvresponse">{!! csrf_field() !!}
          <input type="hidden" name="id" value="{{$invite->inv->id}}">
          <input type="hidden" name="block_name" value="{{$invite->inv->block_name}}">
          <input type="hidden" name="notif" value="{{$invite->id}}">
          <input type="hidden" name="response" value="no">
          <button class="btn btn-red">Refuse</button>
        </form></li>
    </ul>
</div>
