<h1 class="card light">{{$type}} Mail</h1>
<table class="msg_table">
  <thead>
    <col style="width:40%">
    <col style="width:30%">
    <col style="width:30%">
    <tr>
      <th>Users</th>
      <th>Subject</th>
      <th>Last Updated</th>
    </tr>
  </thead>

@foreach($conversations as $conversation)
<tr class="convo_preview" data-convo="{{$conversation->convo_id}}">
  <td>
  <span class="convo_status"><i class="fa fa-envelope"></i></span>
  <?php $count = $conversation->members->count(); ?>
  @if($count > 3)
      @foreach($conversation->members->slice(0,2) as $member)
        <b>{{$member->owner->username}}</b>
      @endforeach
      and {{$count - 3}} more
  @else
      @foreach($conversation->members as $member)
        <b>{{$member->owner->signature}}</b>
      @endforeach
  @endif
  </td>
  <td>
    <?php date("Y-m-d h:i:sa", strtotime($conversation->updated_at)); ?>
  </td>
</tr>
@endforeach
</table>
