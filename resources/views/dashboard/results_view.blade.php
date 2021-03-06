@extends('layouts.admin')
@section('content')
	<div class="row">
		<h1>Students</h1>
   		<a href="/print/academicReports" class="btn btn-info ml-auto" style="padding-top: 12px; color: white;margin-right: 15px; margin-bottom: 5px"> <i class="fa fa-arrow-circle-down"></i>  Print</a>
	</div>
	<table class="table table-striped">
	    <tr>
	        <th>Registration number</th>
	        <th>Student name</th>
	        <th>CIT 3451</th>
	        <th>CIT 3452</th>
	        <th>CCS 3350</th>
	        <th>BFB 3252</th>
	        <th>CIT 2252</th>
	        <th>CIC 3454</th>
	        <th>CCS 3101</th>
	        <th>CIT 3451</th>
	        <th>SPS 3300</th>
	        <th></th>
	    </tr>
		@if(count($exam1)>0)
			@foreach($exam1 as $exam1)
				<tr>
					<td>{{$exam1->reg_no}}</td>
					<td>{{$exam1->student_name}}</td>
					<td>{{$exam1->unit_code1}}</td>
					<td>{{$exam1->unit_code2}}</td>
					<td>{{$exam1->unit_code3}}</td>
					<td>{{$exam1->unit_code4}}</td>
					<td>{{$exam1->unit_code5}}</td>
					<td>{{$exam1->unit_code6}}</td>
					<td>{{$exam1->unit_code7}}</td>
					<td>{{$exam1->unit_code8}}</td>
					<td>{{$exam1->unit_code9}}</td>
					<td><a class="btn btn-primary" href="/exam/{{$exam1->id}}/edit">Update</a></td>
				</tr>
			@endforeach
		@endif
	</table>


@endsection