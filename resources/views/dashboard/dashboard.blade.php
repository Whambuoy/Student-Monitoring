@extends('dashboard.index')
@section('dashContent')
<div class="container">
	<h1>Students</h1>
	<table class="table table-striped">
	    <tr>
	        <th>Student name</th>
	        <th>Gender</th>
	        <th>Date of Birth</th>
	        <th>Date of Adm</th>
	        <th>Course</th>
	        <th>Parent name</th>
	        <th>Parent phone</th>
	        <th></th>
	    </tr>
		@if(count($students)>0)
			@foreach($students as $student)
				<tr>
					<th>{{$student->student_name}}</th>
					<th>{{$student->gender}}</th>
					<th>{{$student->date_of_birth}}</th>
					<th>{{$student->date_of_admission}}</th>
					<th>{{$student->course}}</th>
					<th>{{$student->parent_name}}</th>
					<th>{{$student->parent_phone}}</th>
					<th><a href="#">Edit</a></th>
				</tr>
			@endforeach
		@else
            <p>You have no posts</p>
		@endif
	</table>
</div>

@endsection