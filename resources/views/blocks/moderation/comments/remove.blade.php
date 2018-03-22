@if(isset($mod))
  @if($mod->perms_comments === 1)
  <div class="container-full">
    <div id="comment-remove-{{$comment->id}}" class="comment-remove" style="display: none">
      <h4>Why are you removing this comment?</h4>
      <form class="form-remove" onsubmit="removecomment(this)" method="POST">
        {!! csrf_field() !!}

        <input type="hidden" name="block" value="{{$comment->block_name}}">
        <input type="hidden" name="comment" value="{{$comment->id}}">
      <select name="reason">
        <option default>Select a Reason</option>
        <option value="wrongblock">Content not suitable for this block</option>
        <option value="blockrules">Breaking block rules</option>
        <option value="siterules">Breaking site-wide rules</option>
        <option value="nsfw">NSFW Content</option>
        <option value="other">Other (see: comment)</option>
      </select> <br><br>
      <h4>Additional Comments</h4>
      <div class="container-full">
        <textarea name="mod-comment" placeholder="Comment"></textarea>
      </div>
      <button class="btn btn-blue" type="submit">Submit</button>
      <button class="btn btn-red" onclick="hide('comment-remove-{{$comment->id}}')" type="button">Cancel</button>
    </form>
  </div>
</div>
  @endif
@endif
