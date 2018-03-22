<div id="convo_box" class="conversation bl-lg-10 bl-md-10 bl-sm-12">


<div class="btn_box">
  <button id="convo-leave-btn" class="btn btn-red" onclick="toggle_display('convo-leave-check');toggle_display('convo-leave-btn')">Leave Conversation <i class="fa fa-exit"></i></button>
  <div id="convo-leave-check" style="display: none">
    <ul class="convo-leave">
    <form action="/messages/conversation-leave" method="POST">
      <li><button class="btn btn-blue">Confirm <i class="fa fa-exit"></i></button></li>
    </form>
    <li><button class="btn btn-red" onclick="toggle_display('convo-leave-check'); toggle_display('convo-leave-btn')">Cancel</button></li>
  </ul>
</div>
<h3 class="h-tspaced light"><b>Subject:</b> {{$conversation->subject}}</h3>

<b>Members:</b> @foreach($conversation->users() as $user) {{$user->username}} @endforeach
</div>


<div id="message_return" class="msg_store">
@foreach($messages as $message)
  <div class="convo_msg">
    <span class="msg_author"><a href="/u/{{$message->user->signature}}"><b>{{$message->user->name}}{{htmlspecialchars('@')}}{{$message->user->signature}}</b></a></span><br>
    <span class="msg_text">{!! $message->textbody !!}</span>
  </div>
@endforeach
</div>
  <div class="conversation_new_msg">
    <div id="msg-errors"></div>
    <form id="new_msg" action="" method="POST">
      {!! csrf_field() !!}
      <input type="hidden" name="convo_id" value="{{$conversation->id}}">
      <textarea class="txt-area-msg" name="message_txt"></textarea>
      <button class="btn btn-msg fl-right">Send</button>
    </form>
  </div>

</div>
