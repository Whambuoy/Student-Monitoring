@extends('layouts.admin')
@section('content')
	<h1>Discipline</h1>
	<table class="table table-striped">
	    <tr>
	    	<th>Reg_no</th>
	        <th>Student name</th>
	        <th>Status</th>
	        <th></th>
	    </tr>
		@if(count($discipline)>0)
			@foreach($discipline as $discipline)
				<tr>
					<td>{{$discipline->reg_no}}</td>
					<td>{{$discipline->student_name}}</td>
					<td>{{$discipline->status}}</td>
					<td><a class="btn btn-primary" href="/discipline/{{$discipline->id}}/edit">Update</a></td>
				</tr>
			@endforeach
		@endif
	</table>
@endsection