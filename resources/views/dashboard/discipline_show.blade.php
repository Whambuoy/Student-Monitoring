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
					<th>{{$discipline->reg_no}}</th>
					<th>{{$discipline->student_name}}</th>
					<th>{{$discipline->status}}</th>
					<th><a class="btn btn-primary" href="/discipline/{{$discipline->id}}/edit">Update</a></th>
				</tr>
			@endforeach
		@else
            <p>Nothing to display</p>
		@endif
	</table>
@endsection