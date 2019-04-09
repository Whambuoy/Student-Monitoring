@extends('layouts.admin')
@section('content')
   <form method="post" action="/financials/1/update">
        {{ csrf_field() }}
        <h2>Student Financial Information</h2>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="title">Registration Number</label>
                    <select id="reg_no" value="" type="text" name="reg_no" class="form-control" placeholder="CT202/0027/16" onblur="autofill()">

                        <!--Loops through the students in the database to provide a drop-down list of registration numbers of the available students-->

                        @if(count($students)>0)
                            @foreach($students as $student)
                                <option>{{$student->reg_no}}</option>
                            @endforeach
                        @else
                            <option>No students to add</option>
                        @endif
                    </select>
                </div>
                    @foreach($students as $student)
                        @if($student->reg_no == "<script>document.write(reg_no)</script>")
                            $full_name = {{$student->student_name}};
                            echo $full_name;
                        @else
                        <p>No record</p>

                        @break
                        @endif
                    @endforeach
                <div class="col-md-9">
                    <label for="title">Full name</label>
                    <input id="student_name" value="" type="text" name="student_name" class="form-control" placeholder="John Doe" readonly>
                </div>
            </div>
        	<div class="form-group">
        		<label>Total required</label>
        		<input type="text" name="amount_to_be_paid" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Total paid</label>
        		<input type="text" name="amount_paid" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Balance</label>
        		<input id="balance" type="text" name="balance" class="form-control">
        	</div>
            <br>
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="/financials" class="btn btn-secondary float-right">Back</a>
        </form>

        <script type="text/javascript">
            function autofill(){
                var reg_no = document.getElementById("reg_no").value;
            }

        </script>
@endsection