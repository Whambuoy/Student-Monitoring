@extends('layouts.admin')
@section('content')
<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ml-auto">
      <li class="nav-item active">
        <a href="/student/add"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Add student</button></a>
    </form>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search for student" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
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
					<th><a class="btn btn-primary" href="#">Edit</a></th>
				</tr>
			@endforeach
		@else
            <p>You have no posts</p>
		@endif
	</table>
</div>

@endsection