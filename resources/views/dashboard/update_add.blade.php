@extends('layouts.admin')

@section('content')
<form class="container" method="post" action="update/store">
{{ csrf_field() }}
    <h2 style="text-align: center">Updates</h2>
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Fees Update">
    </div>
    <div class="form-group">
        <label for="description" name="description">Message</label>
        <textarea name="description" class="form-control" id="message" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Add</button>
    <a href="/updates" class="btn btn-secondary float-right">Back</a>
</form>
@endsection