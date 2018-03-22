

@if(Auth::user()) 
<div class="comment-writer">

    <form class="new-comment" onsubmit="comment(this, 'return-t1-comment')"> 
          <h4 class="card"><b>New Comment</b></h4>
          {!! csrf_field() !!}
        <textarea name="text" id="new-comment" class="textarea-def"></textarea>
        <button type="button" class="btn btn-green" onclick="rendertext('new-comment', 'new-comment-preview')">Preview</button>
        <button type="submit" class="btn btn-blue">Submit</button>
        <div class="errors" id="err-return-nc"></div>
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <input type="hidden" name="block_name" value="{{$post->block_name}}">
        <div class="preview-text" id="new-comment-preview"></div>
    </form>
</div>

<div id="return-t1-comment"></div>

@endif