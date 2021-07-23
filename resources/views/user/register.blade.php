@extends('main.navbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 mx-auto mb-3 mt-4">
           <div class="m-4">
            <h4 style="display: inline-block">Add New Student</h4>
            <a href="/faculties/{{ $faculty->id }}"><button class="btn btn-outline-secondary" style="float: right">Back</button></a>
           </div>
            <form action="/users" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control mt-2" name="fullname" id="" placeholder="Full Name">
                    <input type="text" class="form-control mt-2" name="indexNo" id="" placeholder="Index-No">
                    <input type="email" class="form-control mt-2" name="email" id="" placeholder="Email">
                    <input type="password" class="form-control mt-2" name="pwd" id="" placeholder="Password">
                   <select name="deptId" id="" class="form-control mt-2">
                        <option disabled selected value> -- select the Department -- </option>
                       @foreach ($faculty->getDepartments as $department)
                           <option value="{{ $department->id }}">{{ $department->name }}</option>
                       @endforeach
                   </select>
                </div>
                <div class="form-group mt-4">
                    <label>Student's Image</label>
                    <input type="file" name="image_path" class="form-control mt-2">
                </div>
                <div class="d-grid gap-2 mt-2">
                    <button type="submit" class="btn btn-outline-success">Add Student</button>
                </div>
            </form>
        </div>
    </div>
    
    <h2 class="text-center">Students</h2>
    <div class="row">
        @forelse ($users as $user)
        <div class="col-12 col-md-8 col-6 mx-auto shadow mb-2">
            <div style="display: flex; " class="m-2">
                <img class="m-2 rounded-circle" style="width: 100px; height:100px" src="{{ asset('images/studentImages/'. $user->image_path) }}" alt="">
                <div class="col-6 col-md-4 mt-2">
                    Name : {{ $user->name }} <br>Index No : {{ $user->index_no }}<br>Email : {{ $user->email }}<br>Department : {{ $user->getDepartment()->name}}       
                </div>   
                <div class="col-6 col-md-4" style="display:flex; justify-content:space-evenly">
                    <a href="/users/{{ $user->id }}"><button class="btn btn-outline-info mb-1" >View</button></a><br>
                    <a href="/users/{{ $user->id }}/edit"><button class="btn btn-outline-primary mb-1" >Edit</button></a><br>
                    <form action="/users/{{ $user->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline-danger" >Delete </button>
                    </form>
                </div>  
            </div>    
        </div>
        @empty
             No users registered yet...   
        @endforelse
    </div>

</div>


@endsection