@extends('layouts.admin')
@section('content')
   <form method="post" action="">
        {{ csrf_field() }}
        <h2 style="text-align: center">Examinations</h2>
        <hr>
        <div class="form-group">
            <label for="title">Exam title</label>
            <input id="exam_title" type="text" name="exam_title" class="form-control" placeholder="BCT Year 3, Semester 2">
        </div>


      	<h3>Exam units</h3>
      	<hr>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Unit code</label>
                <input id="unit_code1" type="text" name="unit_code1" class="form-control" placeholder="CIT 3500">
            </div>
            <div class="form-group col-md-8">
                <label>Unit name</label>
                <input id="unit_name1" type="text" name="unit_name1" class="form-control" placeholder="Artificial Intelligence">
            </div>                
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <input id="unit_code1" type="text" name="unit_code2" class="form-control" placeholder="CIT 3500">
            </div>
            <div class="form-group col-md-8">
                <input id="unit_name1" type="text" name="unit_name2" class="form-control" placeholder="Artificial Intelligence">
            </div>                
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <input id="unit_code1" type="text" name="unit_code3" class="form-control" placeholder="CIT 3500">
            </div>
            <div class="form-group col-md-8">
                <input id="unit_name1" type="text" name="unit_name3" class="form-control" placeholder="Artificial Intelligence">
            </div>                
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <input id="unit_code1" type="text" name="unit_code4" class="form-control" placeholder="CIT 3500">
            </div>
            <div class="form-group col-md-8">
                <input id="unit_name1" type="text" name="unit_name4" class="form-control" placeholder="Artificial Intelligence">
            </div>                
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <input id="unit_code1" type="text" name="unit_code5" class="form-control" placeholder="CIT 3500">
            </div>
            <div class="form-group col-md-8">
                <input id="unit_name1" type="text" name="unit_name5" class="form-control" placeholder="Artificial Intelligence">
            </div>                
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <input id="unit_code1" type="text" name="unit_code6" class="form-control" placeholder="CIT 3500">
            </div>
            <div class="form-group col-md-8">
                <input id="unit_name1" type="text" name="unit_name6" class="form-control" placeholder="Artificial Intelligence">
            </div>                
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <input id="unit_code1" type="text" name="unit_code7" class="form-control" placeholder="CIT 3500">
            </div>
            <div class="form-group col-md-8">
                <input id="unit_name1" type="text" name="unit_name7" class="form-control" placeholder="Artificial Intelligence">
            </div>                
        </div>
         <div class="row">
            <div class="form-group col-md-4">
                <input id="unit_code1" type="text" name="unit_code8" class="form-control" placeholder="CIT 3500">
            </div>
            <div class="form-group col-md-8">
                <input id="unit_name1" type="text" name="unit_name8" class="form-control" placeholder="Artificial Intelligence">
            </div>                
        </div>
         <div class="row">
            <div class="form-group col-md-4">
                <input id="unit_code1" type="text" name="unit_code9" class="form-control" placeholder="CIT 3500">
            </div>
            <div class="form-group col-md-8">
                <input id="unit_name1" type="text" name="unit_name9" class="form-control" placeholder="Artificial Intelligence">
            </div>                
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
        <a href="/financials" class="btn btn-secondary float-right">Back</a>
        </form>
        <br>

        <script type="text/javascript">
            function calc(){
                var total_required = document.getElementById("total_required").value;
                var total_paid = document.getElementById("total_paid").value;
                document.getElementById("balance").value = total_required - total_paid;
            }

        </script>
@endsection