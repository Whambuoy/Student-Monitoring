@extends('layouts.admin')
@section('content')
<div class="container">
        <div class="row">
          <div class="col-lg-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{count($updates)}}</h3>

                <p>Total Updates</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/updates/add" class="small-box-footer" style="height:40px; padding-top: 10px">Add update <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>

    <h2 style="text-align: center;">Updates</h2>
	<table class="table table-striped">
	    <tr>
	    	<strong>
	    	<th>Title</th>
	        <th style="width:400px">Message</th>
	        <th></th>
	        <th></th>
	        <th></th>
	        </strong>
	    </tr>
		@if(count($updates)>0)
			@foreach($updates as $update)
				<tr>
					<td>{{$update->title}}</td>
					<td>{{$update->message}}</td>
					<td><a class="btn btn-primary" href="/updates/{{$update->id}}/edit">Update</a></td>
					<td><a id="delete" class="btn btn-danger" href="/updates/{{$update->id}}/delete" onclick="confirm_delete()">Delete</a></td>
					<td><a class="btn btn-success" href="sendMessage/{{$update->id}}">Send message <i class="fa fa-arrow-circle-right"></i></a></td>
				</tr>
			@endforeach
		@endif
	</table>
	<hr>
	<div class="row">
		<div class="col-md-4">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{count($sent)}}</h3>

                <p>Sent updates</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/student" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
            </div>			
		</div>
		<div class="col-md-8">
			<h2 style="text-align: center;">Sent updates</h2>
			<table class="table table-striped">
			    <tr>
			    	<strong>
			    	<th>Title</th>
			        <th style="width:400px">Message</th>
			        <th></th>
			        </strong>
			    </tr>
				@if(count($sent)>0)
					@foreach($sent as $update)
						<tr>
							<td>{{$update->title}}</td>
							<td>{{$update->message}}</td>
							<td><a class="btn btn-info" href="/updates/{{$update->id}}/edit">View</a></td>
						</tr>
					@endforeach
				@endif
			</table>			
		</div>

	</div>

</div>

<script type="text/javascript">
	function confirm_delete(){
		var answer = confirm("Delete update?");
		if (answer) {
		   //proceed
		}
		else {
			document.getElementById('delete').setAttribute('href', '#');
		}
	
}
</script>

@endsection