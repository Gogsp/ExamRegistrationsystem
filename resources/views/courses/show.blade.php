@extends('main.navbar')

@section('content')
<div class="container">
  
    <div class="row">
        <div class="col-sm-6 mt-3" style="text-align: end">
            <h1 class="m-3" style="font-weight: bold; display:inline-block; "> {{ $course->name }}</h1>
            <a class="m-4" href="/departments/{{ $department->id }}" style="float: left"><button class="btn btn-outline-dark">Back</button></a>
        </div>
        <hr>
        <div class="col-12 col-md-6 col-lg-4 offset-1 mt-4">
            <h3>Exam Details</h3>
            <hr>
               <p><label for="">Course Name :</label><b>{{ $course->name }} </b></p> 
            @forelse ($course->getExams as $exam)
               @if (!$exam->completed)
                <div>
                    <p><label>Exam Date: </label> <b> {{  $exam->date }}  </b></p>
                    <p><label>Exam Status : </label>
                        @if ($exam->completed == 0)
                            <b style="color: green">Not completed</b>
                        @else
                            <b style="color: red">Completed</b>
                        @endif
                    </p>
                    @if (session()->get('user_type')==1)
                    <a href="/exams/{{ $exam->id }}/edit"><button class="btn btn-outline-primary">Edit</button></a>
                    <a href="/exams/{{ $exam->id }}">
                        <form action="/exams/{{ $exam->id }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger mt-2">Delete</button>
                        </form>
                    </a>
                    @endif
                </div>
               @else
                 
               @endif       
            @empty
               
            @endforelse
        </div> 
       
        @if(session()->get('userId') == 1)
        <div class="col-12 col-md-6 col-lg-4 offset-1 mt-4">
            <h4>Add Exam</h4>
            <form method="POST" action="/exams">
                @csrf
                <div class="form-group mt-4 mb-2">
                    <label>Examination Date : </label>
                    <input type="date" class="form-control mt-2 mb-2" name="date" id="" placeholder="Date of the exam">
                    <input type="text" class="form-control mt-2" name="courseId" id="" value="{{ $course->id }}"  hidden>
                </div>
                <div class="d-grid gap-2 mt-2 mb-2">
                    <button type="submit" class="btn btn-outline-success mt-2">Add Exam</button>
                </div>
            </form>    
        </div> 
        @endif
    </div>
</div>
 
</div>



@endsection