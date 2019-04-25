@extends('layouts.admin')
@section('content')
   <form method="post" action="/discipline/{{$discipline->id}}/update">
        {{ csrf_field() }}
        <h2 style="text-align: center">Student discipline Information</h2>
        <hr>
            <div class="form-row">
                <div class="col-md-4">
                      <div class="w3-card" style="width:200px; height: 155px; margin: 0 auto">
                        <img class="prof_img" src="{{ asset('img/user.svg')}}" alt="Person" style="width:75%">
                      </div>
                      <br>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="title">Registration Number</label>
                        <input id="reg_no" type="text" name="reg_no" class="form-control" placeholder="CT202/0027/16" readonly value="{{$discipline->reg_no}}">
                    </div>
                    <div class="form-group">
                        <label for="title">Full name</label>
                        <input id="student_name" type="text" name="student_name" class="form-control" placeholder="John Doe" readonly value="{{$discipline->student_name}}">
                    </div>
                </div>

            </div>

            <hr>
            <h2 style="text-align: center">Status</h2>
            <hr>
            <div class="form-group">
                <label for="course">Course of Study</label>
                    <select name="status" class="form-control" id="category">
                        <option>{{$discipline->status}}</option>
                        <option>In session</option>
                        <option>Suspended</option>
                        <option>Expelled</option>
                    </select>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Submit</button>
            <a href="/discipline" class="btn btn-secondary float-right">Back</a>
        </form>

@endsection