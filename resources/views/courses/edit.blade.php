@extends('main.navbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto mb-3 mt-4">
            <div>
            <h4 style="display: inline-block">Edit Course</h4>
            <a href="/departments/{{ $department->id }}">
                <button style="float: right" class="btn btn-outline-secondary">Back</button></a>
            </div>
           
            <form method="POST" action="/courses/{{ $course->id }}">
                @csrf
                @method('PUT')
                <div class="form-group mt-4 mb-2">
                    <label>Course Name </label>
                    <input type="text" class="form-control mt-2" name="name" id="" placeholder="Name of the Course" value="{{ $course->name}}">
                    <input type="text" class="form-control mt-2" name="deptId" id="" placeholder="Name of the Faculty" value="{{ $department->id }}" hidden>
                    
                </div>
                <div class="d-grid gap-2 mt-2 mb-2">
                    <button type="submit" class="btn btn-outline-success mt-2">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection