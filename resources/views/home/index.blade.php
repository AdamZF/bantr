@include('headers.home_header')
<div class="container-full t-center">
  <img class="img-full" src='{{URL::asset("assets/images/logo.png")}}'>
</div>
<div class="container t-center">
  <button onclick="hide('register-form'); toggle_display('login-form')" class="btn btn-login">Sign In</button>
  <button onclick="hide('login-form'); toggle_display('register-form');" class="btn btn-register">Register</button>

  @if(count($errors) > 0) <div id="login-form"> @else <div id="login-form" style="display: none;"> @endif

      {!! Form::open(['url' => 'login']) !!}
      <ul class="t-center ul-login">
            <li>{!! Form::text('username', null, ['class' => 'input-def input-login', 'placeholder' => 'Username']) !!}</li>
            <li>{!! Form::password('password', ['class' => 'input-def input-login', 'placeholder' => 'Password']) !!}</li>
            <li>{!! Form::submit('Go', ['class' => 'btn btn-login']) !!}</li>
            {!! Form::close() !!}
      </ul>
          @if (count($errors) > 0)
          <div style="color: red" class="text-center">
                  @foreach ($errors->all() as $error)
                      <p>{{ $error }}</p>
                  @endforeach
          </div>
          @endif
    </div>

    <div id="register-form" style="display: none">
      <form action="/sendverificationmail" method="POST" id="form-verify-email">
        <h3>Verify Your Email (A Registration Token will be sent to you)</h3>
          <ul class="t-center ul-login">
            {!! csrf_field() !!}
            <li><input class="input-def input-login" type="email" name="email_code" placeholder="Email Address"></li>
            <li><input class="input-def input-login" type="email" name="email_code_confirm" placeholder="Confirm Email Address"></li>
            <li><button class="btn btn-login" onclick="verify_email(); return false" type="submit">Submit</button></li>
          </ul>
          <div id="email-data-return"></div>
      </form>
    </div>
    <hr>
</div>

<div class="container">
  <img class="img-full" src="{{URL::asset('assets/images/front-hero-1.jpg')}}">

  <p class="fs-18">
  Perhaps you did some research and 140 characters isn't enough for you.
  Maybe you want to write an article and participate in some grassroots journalism.
  Images, gfycat-embeds, full-width youtube videos, vimeo links and more are available here on bantr.
  As a matter of fact, your post could look just like this does, image and all.
  <br><br><b>Good for small posts too?</b><br><br>
  If you only wish to write a few words, go ahead, it'll look great regardless of how many words you use.
  Even a post with just the word "yes" I can guarantee will look fantastic.
  </p>

  <hr>
</div>

</body>
</html>
