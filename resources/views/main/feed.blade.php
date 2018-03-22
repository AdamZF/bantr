@include('headers.global.head')

@include('nav.default_nav')

<body onload="write_time();fileup();" id="feed_home">

<?php $posts = json_decode($posts); ?>

<div class="container-nav-fixed">
  <div class="container">
    <div class="post-head" style="background-color:{{Auth::user()->post_head_bg}}; color:{{Auth::user()->post_head_txt}}">
        <img class="post-avatar" src="{{Auth::user()->avatar_link}}">
        <div class="post-author">{{Auth::user()->name}}{{htmlspecialchars('@')}}{{Auth::user()->signature}}
        @if(Auth::user()->verified === 1)<i class="fa fa-check"></i>@endif<br>
        Posting at: <span id="current-time"></span></div>
    </div>
    <div class="container-write">
      <form id="form-submit-post" action="/makepost" method="POST" enctype="multipart/form-data">
          {!! csrf_field() !!}
          <textarea onkeyup="autogrow(this,300);" name="post-body" class="txt-area txt-area-post" placeholder="Watcha thinking?"></textarea>

          <button onclick="post(); return false" class="btn btn-submit-def">Submit</button>

      <button type="button" onclick="toggle_txt(this,'Add Media','Hide Media Form');toggle_display('media-insert');" class="btn btn-preview">Add Media</button>
      <button type="button" class="btn btn-preview">Preview</button>

      <div id="media-insert" class="container-media-in" style="display: none">
        <h4>Media</h4>
        <button type="button" id="upload-new" onclick="show('media-up');hide('media-old')" class="btn btn-media btn-media-selected">Upload New</button>
        <button type="button" id="use-old" onclick="select(this,'upload-new');show('media-old');hide('media-up');" class="btn btn-media">Use Old Image(s)</button>
        <button type="button" id="clear-media" onclick="clear('fileup');empty('post-media-preview');" class="btn btn-media">Remove All Media</button>
        <div class="media-box" id="media-up">
            <input accept=".pdf,.jpg,.png,.gif,.jpeg,.PNG,.JPG,.JPEG" class="input-file" id="fileup" type="file" multiple name="media-in[]">
            <div class="media-drop-box" id="media-drop">
                <span class="media-status-def">Click here to Select Files to Upload</span>
            </div>
        </div>
        <div id="post-media-preview"> </div>
          <div id="media-old">

          </div>
      </div>

    </form>

    </div>
    <div id="post-return"></div>
    @foreach($posts->data as $post)
      @include('post.default')
    @endforeach
  </div>
</div>
</body>
</html>
