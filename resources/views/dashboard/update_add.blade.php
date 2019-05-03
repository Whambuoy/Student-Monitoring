@extends('layouts.admin')

@section('content')
<form class="container" method="post" action="store">
{{ csrf_field() }}
    <h2 style="text-align: center">Updates</h2>
    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Fees Update">
        </div>
        <div class="form-group col-md-4">
            <label for="course">Category</label>
                <select name="category" class="form-control" id="category">
                    <option></option>
                    <option>General</option>
                    <option>Specific</option>
                </select>
        </div>
    </div>
    <div class="form-group">
        <label for="message" name="message">Message</label>
        <textarea name="message" class="form-control" id="message" rows="5"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Add</button>
    <a href="/updates" class="btn btn-secondary float-right">Back</a>
</form>
@endsection