<strong>Reports</strong><button class="fl-right btn btn-red" onclick="hide('reports-{{$type}}-{{$ref}}')">Hide X</button>
<ol class="report-list">
@foreach($reports as $report)
<li><b>{{$report->reason}}</b> - {{$report->add_text}}</li>
@endforeach
</ol>
