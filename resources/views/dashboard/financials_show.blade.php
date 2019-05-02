@extends('layouts.admin')
@section('content')
	<h1>Financial Information</h1>
	    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search for student" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

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
					<td><a class="btn btn-primary" href="/financials/{{$financial->id}}/edit">Update</a></td>
				</tr>
			@endforeach
		@endif
	</table>
@endsection