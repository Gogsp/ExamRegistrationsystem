@extends('main.navbar')

@section('content')
<div class="container">
  
    <div class="row">
        <div class="col-sm-6 mt-3" style="text-align: end">
            <h1 class="m-3" style="font-weight: bold; display:inline-block; "> {{ $course->name }}</h1>
            <a class="m-4" href="/courses/{{ $course->id }}" style="float: left"><button class="btn btn-outline-dark">Back</button></a>
        </div>
        <hr>
        <div class="col-12 col-md-6 col-lg-4 offset-1 mt-4">
            <h4>Edit Exam</h4>
            <form method="POST" action="/exams/{{ $exam->id }}">
                @csrf
                @method('PUT')
                <div class="form-group mt-4 mb-2">
                    <label>Examination Date : </label>
                    <input type="date" class="form-control mt-2 mb-2" name="date" id="" placeholder="Date of the exam" value="{{ $exam->date}}">
                    <input type="text" class="form-control mt-2" name="courseId" id="" value="{{ $exam->id }}"  hidden>
                </div>
                <div class="d-grid gap-2 mt-2 mb-2">
                    <button type="submit" class="btn btn-outline-success mt-2">Save Changes</button>
                </div>
            </form>    
        </div> 
    </div>
 
</div>



@endsection