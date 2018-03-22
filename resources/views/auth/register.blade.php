@include('headers.default_header')
<div class="full full-dark">


  <h1 class="t-center light pg-heading h-white"><a href="/"><img src="{{URL::asset('assets/images/logo_white.png')}}"></a></h1>


<div class="login">
  <h1 class="light card h-wide t-center">Register</h1>
      <div class="container-small">
        <form class="form-def" role="form" method="POST" action="{{ url('register') }}">
                    {!! csrf_field() !!}


                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">


                        <div>
                            <input type="text" class="input-def input-login" name="username" value="{{ old('username') }}" placeholder="Username">
                            @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif

                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div>
                            <input type="password" class="input-def input-login" placeholder="Password" checked="" name="password">

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <div>
                            <input type="password" class="input-def input-login" placeholder="Confirm Password"name="password_confirmation">

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-login">
                                <i class="fa fa-btn fa-user"></i>  Register
                            </button>
                        </div>
                    </div>
                </form>

</div>
</div>

@include('footers.default')
