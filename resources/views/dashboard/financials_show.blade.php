@extends('layouts.admin')
@section('content')
	<h1>Students</h1>
	<table class="table table-striped">
	    <tr>
	    	<th>Reg_no</th>
	        <th>Student name</th>
	        <th>Total required</th>
	        <th>Total paid</th>
	        <th>Balance</th>
	        <th></th>
	    </tr>
		@if(count($financials)>0)
			@foreach($financials as $financial)
				<tr>
					<th>{{$financial->reg_no}}</th>
					<th>{{$financial->student_name}}</th>
					<th>{{$financial->amount_to_be_paid}}</th>
					<th>{{$financial->amount_paid}}</th>
					<th>{{$financial->balance}}</th>
					<th><a class="btn btn-primary" href="/financials/1/edit">Update</a></th>
				</tr>
			@endforeach
		@else
            <p>No financials to display</p>
		@endif
	</table>
@endsection