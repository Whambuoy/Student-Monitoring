@extends('layouts.admin')
@section('content')
      <div class="container">
        <div class="jumbotron">
        <h1 class="display-4">Hello, system admin</h1>
        <p class="lead">Welcome to the Student Progress Monitoring System Dashboard</p>
        <hr class="my-4">
        <p>You can add a new update here <i class="fa fa-arrow-circle-down"></i></p>
          <p class="lead">
    <a class="btn btn-primary btn-lg" href="/updates" role="button">Add update</a>
  </p>
      </div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{count($students)}}</h3>

                <p>Total Students</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/student" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$statistics['in_session']}}</h3>

                <p>In session</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="/students/in_session" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$statistics['suspended']}}</h3>

                <p>Suspended</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/students/suspended" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$statistics['expelled']}}</h3>

                <p>Expelled</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/students/expelled" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

</div>

@endsection