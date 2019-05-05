@extends('layouts.admin')
@section('content')

   <form method="post" action="/exams/add/units/{{$exam->id}}/store">
        {{ csrf_field() }}
      	<h3>Exam units</h3>
      	<hr>
        <div class="row">
            <div class="form-group col-md-4">
                <label>Unit code</label>
            </div>
            <div class="form-group col-md-8">
                <label>Unit name</label>
            </div>                
        </div>
       @for($i = 1; $i <= $limit; $i++)
        <div class="row">
            <div class="form-group col-md-4">
                <input id="unit_code1" type="text" name="unit_code{{$i}}" value="{{$exam->unit_code1}}" class="form-control" placeholder="CIT 3500">
            </div>
            <div class="form-group col-md-8">
                <input id="unit_name1" type="text" name="unit_name{{$i}}" value="N/A" class="form-control" placeholder="Artificial Intelligence">
            </div>                
        </div>
        @endfor
        @for($j = $limit+1; $j <= 9; $j++)
        	<input id="unit_code1" type="hidden" name="unit_code{{$j}}" value="N/A" class="form-control" placeholder="CIT 3500">
        @endfor
        <button type="submit" class="btn btn-success">Add units</button>
        <a href="/delete_exam/{{$exam->id}}" onclick="confirm_delete()" id="delete" class="btn btn-secondary float-right">Discard</a>
        </form>

		<script type="text/javascript">
			function confirm_delete(){
				var answer = confirm("This action will cause loss of added changes. Discard changes?");
				if (answer) {
				   //proceed
				}
				else {
					document.getElementById('delete').setAttribute('href', '#');
				}
			
		}
		</script>
@endsection