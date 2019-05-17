@extends('layouts.admin')
@section('content')
<div class="container">
	<div class="row">
		<h1>{{$status}}</h1>
   		<a href="/print/{{$url}}" class="btn btn-info ml-auto" style="padding-top: 12px; color: white;margin-right: 15px; margin-bottom: 5px"> <i class="fa fa-arrow-circle-down"></i>  Print</a>
	</div>
	
	<table class="table table-striped">
	    <tr>
	    	<th>Registration</th>
	        <th>Student name</th>
	        <th>Gender</th>
	        <th>Date of Birth</th>
	        <th>Date of Adm</th>
	        <th>Course</th>
	        <th>Parent name</th>
	        <th>Parent phone</th>
	    </tr>
		@if(count($students)>0)
			@foreach($statuses as $stat)
				@foreach($students as $student)
					@if($stat->reg_no == $student->reg_no)
						<tr>
							<td>{{$student->reg_no}}</td>
							<td>{{$student->student_name}}</td>
							<td>{{$student->gender}}</td>
							<td>{{$student->date_of_birth}}</td>
							<td>{{$student->date_of_admission}}</td>
							<td>{{$student->course}}</td>
							<td>{{$student->parent_name}}</td>
							<td>{{$student->parent_phone}}</td>
						</tr>
					@endif
				@endforeach
			@endforeach
		@endif
	</table>
	<a href="/dashboard" class="btn btn-secondary float-right">Back</a>
</div>

@endsection