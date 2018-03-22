<div id="page-side" class="bl-3 bl-lg-3 bl-md-4 bl-sm-12 bl-sm-hide b-sidebar">
  <button onclick="toggle_sidebar('page-side')" class="toggle-sidebar">Toggle Sidebar</button>
  <form class="block-search" action="/b/{{$block->name}}/search" method="get" id="searchform">
    <input id="searchinput" type="text" name="q" class="b-side-search" placeholder="Search {{$block->name}}">
    <button type="submit" class="side-search btn btn-blue fl-right"><i class="fa fa-search"></i></button>
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


                  {!! Form::submit('Go', ['class' => 'btn btn-blue']) !!}
                  <a class="btn btn-green" href="/register">Register</a>
                  {!! Form::close() !!}


    </div>
  @endif

  @if(Auth::user())
  <a class="b-btn-submit b-submit-self" href="/b/{{$block->name}}/submit/self">Submit New Text Post</a>
  <a class="b-btn-submit b-submit-link" href="/b/{{$block->name}}/submit/link">Submit New Link Post</a>
  @else
  <h4 class="guest light b-btn-submit">Login to Submit A New Post <i class="fa fa-arrow-up"></i></h4>
  @endif
  {{$block->subscribers}} Subscribers
  <br>

  <div id="subscribe-container">
  @if(Auth::user())
    @if(Auth::user()->subscribed($block->name))
      <button id="unsubscribe" onclick="unsubscribe('{{$block->name}}')" class="btn btn-unsubscribe">Unsubscribe</button>
    @else
      <button id="subscribe" onclick="subscribe('{{$block->name}}')" class="btn btn-subscribe">Subscribe</button>
    @endif
  @endif
</div>
  <br>
  <div class="sidebar-wrapper">
  {!! $block->sidebar_compiled !!}
  </div>
  <a href="/create-block" id="new-block" class="a-new-block">Create a New Block</a>


  @foreach($block->mods as $moderator)
    {{dd('enasdf')}}
  @endforeach

  @if(Auth::user())
    <?php $mod = Auth::user()->mods_sub($block->name); ?>
    @if($mod)
      @include('blocks.sidebar.moderation')
    @endif

  @endif
</div>
