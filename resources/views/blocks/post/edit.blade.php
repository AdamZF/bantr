<form class="form-update" onsubmit="sendform('updatepost', this, 'sp-{{$post->unique_id}}', 'post-editor-{{$post->id}}')">
<input type="hidden" name="post" value="{{$post->id}}">
{!! csrf_field() !!}
<textarea id="post-edit-{{$post->id}}" name="text">{{$post->body}}</textarea>
<button type="button" class="btn btn-green" onclick="rendertext('post-edit-{{$post->id}}', 'pep-{{$post->id}}')">Preview</button>
<button type="button" class="btn btn-red fl-right" onclick="hide('post-editor-{{$post->id}}')">Cancel</button>
<button class="btn btn-blue">Update</button>
</form>
<div id="pep-{{$post->id}}" class="post-edit-preview"></div>