@extends('layouts.admin')
@section('content')
	<h1>Financial Information</h1>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a href="/financials/add"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Add student financials</button></a>
    </form>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search for student" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

	<table class="table table-striped">
	    <tr>
	    	<strong>
	    	<th>Reg_no</th>
	        <th>Student name</th>
	        <th>Total required</th>
	        <th>Total paid</th>
	        <th>Balance</th>
	        <th></th>
	        </strong>
	    </tr>
		@if(count($financials)>0)
			@foreach($financials as $financial)
				<tr>
					<td>{{$financial->reg_no}}</td>
					<td>{{$financial->student_name}}</td>
					<td>{{$financial->amount_to_be_paid}}</td>
					<td>{{$financial->amount_paid}}</td>
					<td>{{$financial->balance}}</td>
					<td><a class="btn btn-primary" href="/financials/1/edit">Update</a></td>
				</tr>
			@endforeach
		@else
            <p>No financials to display</p>
		@endif
	</table>
@endsection