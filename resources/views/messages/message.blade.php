<div class="convo_msg">
  <div class="msg_author"><a href="/u/{{$message->user->username}}">{{$message->user->username}}</a> <span class="time"><?php echo time_elapsed_string($message->created_at); ?></div>
  <div class="msg_text">{!! $message->textbody !!}</div>
</div>
