@extends('messages.base')

@section('content')

    <form class="msg-compose" action="/newmessage" method="POST">
      <h3 class="h-tspaced light">Subject:</h3>
      <input type="text" name="subject">
      <h3 class="h-tspaced light">To: (single person or multiple separated by commas)</h3>
      <input type="text" name="to">
      {!! csrf_field() !!}
      <h3 class="h-tspaced light">Message</h3>
      <textarea name="body"></textarea><br>
      <button class="btn btn-blue">Send Message </button>
    </form>

@endsection
