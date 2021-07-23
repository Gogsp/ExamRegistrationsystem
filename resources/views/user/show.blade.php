@extends('main.navbar')

@section('content')
<div class="container">
    @if ($user->user_type==0)
    <div class="row">
        <div class="col-12 col-md-8 col-6 mx-auto shadow m-4">
            <div style="text-align:center" class="m-4" >
                <h1>Student Details</h1>
                    <img class="mt-2 mb-2 img-thumbnail rounded" style="width: 120px; height:120px" src="{{ asset('images/studentImages/'. $user->image_path) }}" alt="">
                    <br>
            </div>   
            <div class="m-4" style="font-size:20px;"> 
                <label>Full Name             : </label> {{ $user->name }} <br>
                <label>Index Number          : </label> {{ $user->index_no }} <br>
                <label>Email Address         : </label> {{ $user->email }} <br>
                <label>Department            :</label>{{ $user->getDepartment()->name }} <br>   
            </div>         
        </div>

        <div>
            <h3 style="text-align: center">Exam Registration</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Examination date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($department->getCourses as $course )  
                        @forelse ($course->getExams  as  $exam)
                          
                            <tr>
                                <td> {{ $course->name }}</td>
                                <td>{{ $exam->date }}</td>
                                <td>
                                    <form action="/studentexams" method="POST">
                                        @csrf
                                        <input type="text" name="examId" value="{{ $exam->id }}" hidden>
                                        <input type="text" name="studentId" value="{{ $user->id }}" hidden>
                                        @if(in_array($exam->id,$examsId))
                                            <p class="text-success">applied</p>
                                        @else
                                        
                                        <button type="submit" class="btn btn-outline-primary">Apply</button>  
                                        @endif  
                                    </form>
                                </td>

                            @empty
                             
                            @endforelse    
                        </tr>
                        @empty

                        @endforelse
                </tbody>
            </table>
        </div>       
    </div>
    @else
    <div class="row">
        <div class="col-12 col-md-8 col-6 mx-auto shadow m-4">
            <div style="text-align:center" class="m-4" >
                Welcome, {{ $user->name }}
                
            </div>
        </div>
    </div>
    
    @endif
</div>
@endsection

