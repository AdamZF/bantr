@include('headers.default_header')
<div class="full full-dark">


  <h1 class="t-center light pg-heading h-white"><a href="/"><img src="{{URL::asset('assets/images/logo_white.png')}}"></a></h1>


<div class="login">
  <h1 class="light card h-wide t-center">Sign In</h1>
      <div class="container-small">
        {!! Form::open(['url' => 'login']) !!}

              {!! Form::text('username', null, ['class' => 'input-def input-login', 'placeholder' => 'Username']) !!}
              {!! Form::password('password', ['class' => 'input-def input-login', 'placeholder' => 'Password']) !!}
              {!! csrf_field() !!}
              {!! Form::submit('Go', ['class' => 'btn btn-login']) !!}
              {!! Form::close() !!}

            @if (count($errors) > 0)
            <div style="color: red" class="text-center">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
            </div>
            @endif
  <p>Don't have an account? <a href="/register">Register</a></p>
</div>
</div>
</div>

@include('footers.default')
