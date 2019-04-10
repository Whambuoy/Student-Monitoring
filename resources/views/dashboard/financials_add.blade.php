@extends('layouts.admin')
@section('content')
   <form method="post" action="/financials/store">
        {{ csrf_field() }}
        <h2>Student Financial Information</h2>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="title">Registration Number</label>
                    <select id="reg_no" value="" type="text" name="reg_no" class="form-control" placeholder="CT202/0027/16" onchange="autofill(this.value)">

                        <!--Loops through the students in the database to provide a drop-down list of registration numbers of the available students-->

                        @if(count($students)>0)
                            @foreach($students as $student)
                                <option value="{{$student->reg_no}}">{{$student->reg_no}}</option>
                            @endforeach
                        @else
                            <option>No students to add</option>
                        @endif
                    </select>
                </div>
                <div class="col-md-9">
                    <label for="title">Full name</label>
                    <input id="student_name" value="" type="text" name="student_name" class="form-control" placeholder="John Doe" readonly>
                </div>
            </div>
        	<div class="form-group">
        		<label>Total required</label>
        		<input id="total_required" type="text" onblur="test()" name="amount_to_be_paid" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Total paid</label>
        		<input id="total_paid" onblur="test()" type="text" name="amount_paid" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Balance</label>
        		<input id="balance" type="text" name="balance" class="form-control" readonly>
        	</div>
            <br>
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="/financials" class="btn btn-secondary float-right">Back</a>
        </form>

        <script type="text/javascript">
            function autofill(reg_no){
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function(){
                    if (this.readyState == 4 && this.status == 200){
                        document.getElementById("student_name").value = "Yeah";
                    }
                    else{
                        alert(this.readyState);
                    }
                };
                xhttp.open("GET", "/financials/add/"+reg_no, true);
                xhttp.send();
            }

            function test(){
                var total_required = document.getElementById("total_required").value;
                var total_paid = document.getElementById("total_paid").value;
                document.getElementById("balance").value = total_required - total_paid;
            }

        </script>
@endsection