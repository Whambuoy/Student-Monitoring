@extends('layouts.admin')
@section('content')
   <form method="post" action="/financials/1/update">
        {{ csrf_field() }}
        <h2>Student Financial Information</h2>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="title">Registration Number</label>
                    <select value="" type="text" name="reg_no" class="form-control" placeholder="CT202/0027/16">
                        @if(count($students)>0)
                            @foreach($students as $student)
                                <option>{{$student->reg_no}}</option>
                            @endforeach
                        @else
                            <p>No students to add</p>
                        @endif
                    </select>
                </div>
                <div class="col-md-9">
                    <label for="title">Full name</label>
                    <input value="{{$student->student_name}}" type="text" name="student_name" class="form-control" id="title" placeholder="John Doe" readonly>
                </div>
            </div>
        	<div class="form-group">
        		<label>Total required</label>
        		<input type="text" name="amount_to_be_paid" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Total paid</label>
        		<input type="text" name="amount_to_be_paid" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Balance</label>
        		<input type="text" name="amount_to_be_paid" class="form-control">
        	</div>
            <br>
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="/financials" class="btn btn-secondary float-right">Back</a>
        </form>
@endsection