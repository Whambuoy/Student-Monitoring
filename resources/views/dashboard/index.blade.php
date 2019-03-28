@extends('layouts.app')

@section('content')
<div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Personal Information</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="/create">Add</a>
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
        @yield('dashContent')
    </div>

</div>
@endsection
