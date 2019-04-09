@extends('layouts.admin')
@section('content')
   <form method="post" action="/financials/{{$financial->id}}/update">
        {{ csrf_field() }}
        <h2>Student Financial Information</h2>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="title">Registration Number</label>
                    <input value="{{$financial->reg_no}}" type="text" name="reg_no" class="form-control" id="title" placeholder="CT202/0027/16" readonly="">
                </div>
                <div class="col-md-9">
                    <label for="title">Full name</label>
                    <input value="{{$financial->student_name}}" type="text" name="student_name" class="form-control" id="title" placeholder="John Doe" readonly>
                </div>
            </div>
        	<div class="form-group">
        		<label>Total required</label>
        		<input value="{{$financial->amount_to_be_paid}}" type="text" name="amount_to_be_paid" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Total paid</label>
        		<input value="{{$financial->amount_paid}}" type="text" name="amount_to_be_paid" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Balance</label>
        		<input value="{{$financial->balance}}" type="text" name="amount_to_be_paid" class="form-control" readonly>
        	</div>
            <br>
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="/financials" class="btn btn-secondary float-right">Back</a>
        </form>
@endsection