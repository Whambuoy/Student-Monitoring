@extends('layouts.admin')

@section('content')
<div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Personal Information</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/create">Add</a>
          <a class="dropdown-item" href="/update">Update</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/dashboard">Show all</a>
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
        @yield('personalInfo')
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        @yield('academics')
    </div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
        @yield('financial')
    </div>

</div>
@endsection
