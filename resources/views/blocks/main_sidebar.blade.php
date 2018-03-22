<div id="page-side" class="bl-3 bl-lg-3 bl-md-4 bl-sm-12 bl-sm-hide b-sidebar front-side">
<button onclick="toggle_sidebar('page-side')" class="toggle-sidebar">Toggle Sidebar</button>
  <form class="search-side" action="/search" method="GET">
    <input type="text" placeholder="Find New Blocks" name="q">
    <input type="hidden" name="st" value="block">
    <button type="submit"><i class="fa fa-search"></i></button>
  </form>
  @if(Auth::guest())
    <div class="login-side-container">
            {!! Form::open(['url' => 'login', 'class' => 'login-sidebar']) !!}

                  {!! Form::text('username', null, ['class' => ' input-sidebar', 'placeholder' => 'Username']) !!}
                  {!! Form::password('password', ['class' => 'input-sidebar', 'placeholder' => 'Password']) !!}
                  {!! csrf_field() !!}

                  @if (count($errors) > 0)
                  <div style="color: red" class="text-center">
                          @foreach ($errors->all() as $error)
                              <p>{{ $error }}</p>
                          @endforeach
                  </div>
                  @endif

                  
                  {!! Form::submit('Login', ['class' => 'btn btn-blue']) !!}
                  <a href="/register" class="btn btn-green">Register</a>
                  {!! Form::close() !!}


    </div>
  @endif
  <img class="img-res" src="{{URL::asset('assets/images/front_side.png')}}">
  <h2 class="h-tspaced">Bantr</h2>
  <p>A collaborative content-aggregator where anyone can post about anything, provided it's within the scope 
  of our <a href="/rules">rules</a></p>
  <h3 class="h-tspaced">Info</h3>
  <ul>
    <li><a href="/about">About</a></li>
    <li><a href="/faq">FAQ</a></li>
    <li><a href="/create-block" id="new-block">Create a New Block</a></li>
  </ul>

</div>
