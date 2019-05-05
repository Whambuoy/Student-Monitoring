@extends('layouts.admin')
@section('content')
	<h1>Exams</h1>
	<table class="table table-striped">
	    <tr>
	        <th>Exam</th>
	        <th>Units taken</th>
	        <th>Unit 1</th>
	        <th>Unit 2</th>
	        <th>Unit 3</th>
	        <th>Unit 4</th>
	        <th>Unit 5</th>
	        <th>Unit 6</th>
	        <th>Unit 7</th>
	        <th>Unit 8</th>
	        <th>Unit 9</th>
	    </tr>
		@if(count($exams)>0)
			@foreach($exams as $exam)
				<tr>
					<td>{{$exam->exam_title}}</td>
					<td>{{$exam->units_taken}}</td>
					<td>{{$exam->unit_code1}}</td>
					<td>{{$exam->unit_code2}}</td>
					<td>{{$exam->unit_code3}}</td>
					<td>{{$exam->unit_code4}}</td>
					<td>{{$exam->unit_code5}}</td>
					<td>{{$exam->unit_code6}}</td>
					<td>{{$exam->unit_code7}}</td>
					<td>{{$exam->unit_code8}}</td>
					<td>{{$exam->unit_code9}}</td>
				</tr>
			@endforeach
		@endif
	</table>
@endsection