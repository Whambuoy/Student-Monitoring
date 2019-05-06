@extends('layouts.admin')
@section('content')
   <form method="post" action="/exam/{{$student->id}}/update">
        {{ csrf_field() }}
        <h2 style="text-align: center">Student Financial Information</h2>
        <hr>
            <div class="form-row">
                <div class="col-md-4">
                      <div class="w3-card" style="width:70%; margin: 0 auto">
                        <img src="{{ asset('img/user.svg')}}" alt="Person" style="width:100%">
                      </div>
                      <br>
                </div>
                <div class="form-group col-md-8">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="reg_no">Registration Number</label>
                            <input value="{{$student->reg_no}}" type="text" name="reg_no" class="form-control" id="title" placeholder="CT202/0027/16" readonly>
                        </div>
                        <div class="form-group"> 
                            <label for="student_name">Full name</label>
                            <input value="{{$student->student_name}}" pattern="[a-zA-Z]+[ ][a-zA-Z]+\s?[a-zA-Z]+" title="Enter a valid name eg: John Doe" type="text" name="student_name" class="form-control" id="title" placeholder="John Doe">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>CIT 3451</label>
                    <input id="total_required" type="text" name="unit_code1" class="form-control" value="{{$student->unit_code1}}" pattern="[0-9]+" title="Please enter a valid amount">
                </div>
                <div class="form-group col-md-6">
                    <label>CIT 3452</label>
                    <input id="total_paid" name="unit_code2" type="text" class="form-control" value="{{$student->unit_code2}}" pattern="[0-9]+" >
                </div>                
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>CCS 3350</label>
                    <input id="total_required" type="text" name="unit_code3" class="form-control" value="{{$student->unit_code3}}" pattern="[0-9]+">
                </div>
                <div class="form-group col-md-6">
                    <label>BFB 3252</label>
                    <input id="total_paid" onblur="calc()" type="text" name="unit_code4" class="form-control" value="{{$student->unit_code4}}" pattern="[0-9]+" >
                </div>                
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>CIT 2252</label>
                    <input id="total_required" type="text" name="unit_code5" class="form-control" value="{{$student->unit_code5}}" pattern="[0-9]+" >
                </div>
                <div class="form-group col-md-6">
                    <label>CIC 3454</label>
                    <input id="total_paid" type="text" name="unit_code6" class="form-control" value="{{$student->unit_code6}}" pattern="[0-9]+" >
                </div>                
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>CCS 3101</label>
                    <input id="total_required" type="text" name="unit_code7" class="form-control" value="{{$student->unit_code7}}" pattern="[0-9]+" >
                </div>
                <div class="form-group col-md-6">
                    <label>CIT 3421</label>
                    <input id="total_paid" onblur="calc()" type="text" name="unit_code8" class="form-control" value="{{$student->unit_code8}}" pattern="[0-9]+">
                </div>                
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>SPS 3300</label>
                    <input id="total_required" type="text" name="unit_code9" class="form-control" value="{{$student->unit_code9}}" pattern="[0-9]+">
                </div>
                <div class="form-group col-md-6">
                   
                </div>                
            </div>

            <br>
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="/exams" class="btn btn-secondary float-right">Back</a>
        </form>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript">
            function autofill(str){
                if (str.length == 0){
                    alert("Please fill in registration number");
                }else{
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function(){
                        if(this.readyState == 4 && this.status == 200){
                            document.getElementById('student_name').value = this.responseText;
                        }
                    ;}
                    xmlhttp.open("GET", "getStudent/" + str, true);
                    xmlhttp.send();
                }
            }

        </script>

@endsection