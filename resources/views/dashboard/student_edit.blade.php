@extends('layouts.admin')
@section('content')
    <form method="post" action="/student/{{$student->id}}/update">
        {{ csrf_field() }}
        <h2>Student Information</h2>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="title">Registration Number</label>
                    <input value="{{$student->reg_no}}" type="text" name="reg_no" class="form-control" id="title" placeholder="CT202/0027/16">
                </div>
                <div class="col-md-9">
                    <label for="title">Full name</label>
                    <input value="{{$student->student_name}}" type="text" name="student_name" class="form-control" id="title" placeholder="John Doe">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="category">Gender</label>
                    <select value="{{$student->gender}}" name="gender" class="form-control" id="category">
                    <option>Male</option>
                    <option>Female</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="link">Date of Birth</label>
                    <input value="{{$student->date_of_birth}}" name="date_of_birth" type="date" class="form-control" id="link" placeholder="https://youtu.be/9q0vXviGToM">
                </div>
                <div class="form-group col-md-4">
                    <label for="link">Date of Admission</label>
                    <input value="{{$student->date_of_admission}}" name="date_of_admission" type="date" class="form-control" id="link" placeholder="https://youtu.be/9q0vXviGToM">
                </div>
            </div>
            <div class="form-group">
                <label for="title">Course of Study</label>
                <input value="{{$student->course}}" type="text" name="course" class="form-control" id="title" placeholder="Bachelor of Science in Computer Technology">
            </div>
            <hr>
            <h2>Parent Information</h2>
            <div class="form-row">
                <div class="col-md-6">
                    <label for="link">Full name</label>
                    <input value="{{$student->parent_name}}" name="parent_name" type="text" class="form-control" id="link" placeholder="Jack Sparrow Doe">
                </div>
                <div class="col-md-6">
                    <label for="link">Phone number</label>
                    <input value="{{$student->parent_phone}}" name="parent_phone" type="text" class="form-control" id="link" placeholder="+254 712 345 678">
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="/student" class="btn btn-secondary float-right">Back</a>
    </form>
@endsection