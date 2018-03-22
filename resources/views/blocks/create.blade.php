@include('headers.default_header')
@include('nav.default_nav')
<div class="container">
  <h1 class="h-tspaced t-center light">Create a New Block</h1>
  <hr>
  <form class="form-std form-create-block" action="/block/create" method="POST">
    <h3>Block Name</h3>
    <input type="text" name="block-name" placeholder="be creative">
    <p class="tip">Should be less than 32 characters.</p>
    @if(count($errors) > 0)
      @foreach($errors->all() as $error)
        <p class="error-message">{{$error}}</p>
      @endforeach
    @endif
    {!! csrf_field() !!}
    <h3>Block Description</h3>
    <textarea class="txt-area-std" name="block-description"></textarea>
    <p class="tip">You can change this at any time.</p>
    <h3>Block Title</h3>
    <input type="text" name="block-title" placeholder="e.g. Best Block Ever">
    <p class="tip">(goes in the web title) keep to a minimum number of characters, can be changed at any time.</p>
    <h3>Block Sidebar</h3>
    <textarea name="block-sidebar"></textarea>
    <p class="tip">Can be left blank and updated later</p>
    <hr>
    <button type="submit" class="btn btn-blue">Create Block</button>
  </form>
</div>
@include('footers.default')
