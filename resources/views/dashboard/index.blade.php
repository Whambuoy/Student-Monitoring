@extends('layouts.app')

@section('content')
<div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Personal Information</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#add">Add</a>
          <a class="dropdown-item" href="#">Update</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Delete</a>
        </div>
      </li>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Academics</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Financial</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Discipline</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="add" role="tabpanel" aria-labelledby="home-tab">
            <form class="container" method="post" action="store">
                {{ csrf_field() }}
                <br>
                <h2>Student Information</h2>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="title">Registration Number</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="CT202/0027/16">
                        </div>
                        <div class="col-md-9">
                            <label for="title">Full name</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="John Doe">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="category">Gender</label>
                            <select name="category" class="form-control" id="category">
                            <option>Male</option>
                            <option>Female</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="link">Date of Birth</label>
                            <input name="link" type="date" class="form-control" id="link" placeholder="https://youtu.be/9q0vXviGToM">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="link">Date of Admission</label>
                            <input name="link" type="date" class="form-control" id="link" placeholder="https://youtu.be/9q0vXviGToM">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="title">Course of Study</label>
                        <input type="text" name="title" class="form-control" id="title" placeholder="Bachelor of Science in Computer Technology">
                    </div>
                    <hr>
                    <h2>Parent Information</h2>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="link">Full name</label>
                            <input name="link" type="text" class="form-control" id="link" placeholder="Jack Sparrow Doe">
                        </div>
                        <div class="col-md-6">
                            <label for="link">Phone number</label>
                            <input name="link" type="text" class="form-control" id="link" placeholder="+254 712 345 678">
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Submit</button>
            </form>
      </div>
      <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
    </div>

</div>
@endsection
