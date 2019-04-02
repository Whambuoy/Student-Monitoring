@extends('layouts.admin')
@section('content')
    <form method="post" action="/student/store">
        {{ csrf_field() }}
        <h2>Student Information</h2>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="reg_no">Registration Number</label>
                    <input type="text" name="reg_no" class="form-control" id="title" placeholder="CT202/0027/16">
                </div>
                <div class="col-md-9">
                    <label for="student_name">Full name</label>
                    <input type="text" name="student_name" class="form-control" id="title" placeholder="John Doe">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-control" id="category">
                    <option>Male</option>
                    <option>Female</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="date_of_birth">Date of Birth</label>
                    <input name="date_of_birth" type="date" class="form-control" id="link"> 
                </div>
                <div class="form-group col-md-4">
                    <label for="date_of_admission">Date of Admission</label>
                    <input name="date_of_admission" type="date" class="form-control" id="link">
                </div>
            </div>
            <div class="form-group">
                <label for="course">Course of Study</label>
                    <select name="course" class="form-control" id="category">
                    <option>Bsc. Computer Science</option>
                    <option>Bsc. Computer Technology</option>
                    <option>Bsc. Information Technology</option>
                    <option>Bsc. Computer Technology</option>
                    </select>
            </div>
            <hr>
            <h2>Parent Information</h2>
            <div class="form-row">
                <div class="col-md-6">
                    <label for="link">Full name</label>
                    <input name="parent_name" type="text" class="form-control" id="link" placeholder="Jack Sparrow Doe">
                </div>
                <div class="col-md-6">
                    <label for="link">Phone number</label>
                    <input name="parent_phone" type="text" class="form-control" id="link" placeholder="+254 712 345 678">
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="/student" class="btn btn-secondary float-right">Back</a>
    </form>
@endsection