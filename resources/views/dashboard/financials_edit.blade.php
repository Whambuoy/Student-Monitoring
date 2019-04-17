@extends('layouts.admin')
@section('content')
   <form method="post" action="/financials/{{$financial->id}}/update">
        {{ csrf_field() }}
        <h2 style="text-align: center">Student Financial Information</h2>
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
                        <input id="reg_no" type="text" name="reg_no" class="form-control" placeholder="CT202/0027/16" readonly value="{{$financial->reg_no}}">
                    </div>
                    <div class="form-group">
                        <label for="title">Full name</label>
                        <input id="student_name" type="text" name="student_name" class="form-control" placeholder="John Doe" readonly value="{{$financial->student_name}}">
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Total required</label>
                    <input id="total_required" type="text" name="amount_to_be_paid" class="form-control" value="{{$financial->amount_to_be_paid}}">
                </div>
                <div class="form-group col-md-6">
                    <label>Total paid</label>
                    <input id="total_paid" onblur="calc()" type="text" name="amount_paid" class="form-control" value="{{$financial->amount_paid}}">
                </div>                
            </div>

            <div class="form-group">
                <label>Balance</label>
                <input id="balance" type="text" name="balance" class="form-control" readonly>
            </div>
            <br>
            <button type="submit" onclick="calc()" class="btn btn-success">Submit</button>
            <a href="/financials" class="btn btn-secondary float-right">Back</a>
        </form>

        <script type="text/javascript">
            function calc(){
                var total_required = document.getElementById("total_required").value;
                var total_paid = document.getElementById("total_paid").value;
                document.getElementById("balance").value = total_required - total_paid;
            }

        </script>
@endsection