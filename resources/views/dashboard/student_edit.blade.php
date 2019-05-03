@extends('layouts.admin')
@section('content')
    <form onload="restrictFutureDate()" method="post" action="/student/{{$student->id}}/update">
        {{ csrf_field() }}
        <h2 style="text-align: center">Student Information</h2>
        <hr>
            <div class="form-row">
                <div class="col-md-4">
                      <div class="w3-card" style="width:70%; margin: 0 auto">
                        <img src="{{ asset('img/user.svg')}}" alt="Person" style="width:100%">
                      </div>
                      <br>
                </div>
                <div class="form-group col-md-8">
                    <div class="row form-group">
                        <div class="col-md-4">
                            <label for="reg_no">Registration Number</label>
                            <input value="{{$student->reg_no}}" type="text" name="reg_no" class="form-control" id="title" placeholder="CT202/0027/16">
                        </div>
                        <div class="col-md-8">
                            <label for="student_name">Full name</label>
                            <input value="{{$student->student_name}}" pattern="[a-zA-Z]+[ ][a-zA-Z]+\s?[a-zA-Z]+" title="Enter a valid name eg: John Doe" type="text" name="student_name" class="form-control" id="title" placeholder="John Doe">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="gender">Gender</label>
                            <select name="gender" class="form-control" id="category">
                                <option>{{$student->gender}}</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="course">Course of Study</label>
                                <select name="course" class="form-control" id="category">
                                    <option>{{$student->course}}</option>
                                    <option>Bsc. Computer Science</option>
                                    <option>Bsc. Computer Technology</option>
                                    <option>Bsc. Information Technology</option>
                                    <option>Bsc. Computer Technology</option>
                                </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="date_of_birth">Date of Birth</label>
                            <input value="{{$student->date_of_birth}}" max="2001-12-31" name="date_of_birth" type="date" class="form-control" id="link"> 
                        </div>
                        <div class="form-group col-md-6">
                            <label for="date_of_admission">Date of Admission</label>
                            <input value="{{$student->date_of_admission}}" id="admission" name="date_of_admission" type="date" class="form-control" id="link">
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">


            </div>

            <hr>
            <h2 style="text-align: center">Parent Information</h2>
            <hr>
            <div class="form-row">
                <div class="col-md-6">
                    <label for="link">Full name</label>
                    <input value="{{$student->parent_name}}" name="parent_name" pattern="[a-zA-Z]+[ ][a-zA-Z]+\s?[a-zA-Z]+" title="Enter a valid name eg: John Doe" type="text" class="form-control" id="link" placeholder="Jack Sparrow Doe">
                </div>
                <div class="col-md-6">
                    <label for="link">Phone number</label>
                    <input value="{{$student->parent_phone}}" pattern="[a-zA-Z]+[ ][a-zA-Z]+" title="Enter a valid name eg: John Doe" name="parent_phone" pattern="(?=.*\d).{10,}" title="Please enter valid phone number" type="text" class="form-control" id="link" placeholder="+254 712 345 678">
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="/student" class="btn btn-secondary float-right">Back</a>
            <input type="text" id='test' name="">
    </form>
    <script type="text/javascript">
        window.onload(){function restrictFutureDate(){
            var element = document.getElementById('admission')
            Use new Date() to generate a new Date object containing the current date and time.

            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
            var yyyy = today.getFullYear();

            today = yyyy + '-' + mm + '-' + dd;

            element.setAttribute('max',today);
            document.getElementById('test').value = "today";
        }
        }
        
    </script>
@endsection