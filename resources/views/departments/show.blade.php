@extends('main.navbar')

@section('content')
<div class="container">
  
    <div class="row">
        <div class="col-sm-6 mt-3" style="text-align: end">
            <h1 class="m-3" style="font-weight: bold;display:inline-block; ">{{ $department->name }} Department</h1>
            <a class="m-4" style="float: left;" href="/faculties/{{ $faculty->id }}"><button class="btn btn-outline-dark">Back</button></a>
        </div>
        <hr >
        <div class="col-12 col-md-6 col-lg-6 mt-4">
            <h3>Courses</h3>  
            <table class="table">
                <tbody>
                    
               @forelse ($department->getCourses as $course)
                   
              
                <tr>
                   <td class="col-9">{{ $course->name }}</td>
                   <td  class="col-1">
                    <a href="/courses/{{ $course->id }}"><button type="submit" class="btn btn-outline-info btn-sm">
                        View 
                    </button></a>
                   </td>
                   @if(session()->get('userId') == 1)
                   <td class="col-1">
                    <a href="/courses/{{ $course->id }}/edit"><button type="submit" class="btn btn-outline-primary btn-sm">
                        Edit
                    </button></a>
                   </td>
                    <td class="col-1">
                        <form action="/courses/{{ $course->id }}" method="POST" >
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                Delete
                            </button>
                        </form>
                    </td>
                    @endif
                    @empty
                   <td>
                       No Courses Added yet
                   </td>
                    @endforelse
              
               
                    </tr>
                </tbody>
            </table>
        </div>
        @if(session()->get('userId') == 1)
        <div class="col-12 col-md-6 col-lg-4 offset-1 mt-4">
            <h4>Add Courses</h4>
            <form method="POST" action="/courses">
                @csrf
                <div class="form-group mt-4 mb-2">
                    <label>Course Name </label>
                    <input type="text" class="form-control mt-2" name="name" id="" placeholder="Name of the Course">
                    <input type="text" class="form-control mt-2" name="deptid" id="" value="{{ $department->id }}" hidden>
                  
                </div>
                <div class="d-grid gap-2 mt-2 mb-2">
                    <button type="submit" class="btn btn-outline-success mt-2">Add Course</button>
                </div>
            </form>
          

        </div>
        @endif
    </div>
      

 
</div>



@endsection