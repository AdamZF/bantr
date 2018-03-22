<tr>
<td><a href="/u/{{$ban->username}}">{{$ban->username}}</a></td>
<td>@if($ban->ends) {{$ban->ends}} @else Never @endif</td>
<td><a href="/u/{{$ban->mod_username}}">{{$ban->mod_username}}</a></td>
<td><button class="btn btn-blue" onclick="unban(this)" data-user="{{$ban->username}}" data-block="{{$block->name}}">Unban</button></td>
</tr>


