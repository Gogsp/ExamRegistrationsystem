@extends('main.navbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 mx-auto mb-3 mt-4">
            <div class="m-4">
                <h4 style="display: inline-block">Edit Student Details</h4>
                <a href="/users/create/{{ $faculty->id }}"><button class="btn btn-outline-secondary" style="float: right">Back</button></a>
               </div>
            <form action="/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <input type="text" class="form-control mt-2" name="fullname" id="" placeholder="Full Name" value="{{ $user->name }}">
                    <input type="text" class="form-control mt-2" name="indexNo" id="" placeholder="Index-No" value="{{ $user->index_no }}">
                    <input type="email" class="form-control mt-2" name="email" id="" placeholder="Email" value="{{ $user->email }}">
                    <input type="password" class="form-control mt-2" name="pwd" id="" placeholder="Password" value="{{ $user->password }}">
                   <select name="deptId" id="" class="form-control mt-2">
                        {{-- <option disabled selected value> -- select the Department -- </option> --}}
                       @foreach ($faculty->getDepartments as $department)
                           <option selected value="{{ $department->id }}">{{ $department->name }}</option>
                       @endforeach
                   </select>
                </div>
                <div class="form-group mt-4">
                    <label>Student's Image</label>
                    <input type="file" name="image_path" class="form-control">
                </div>
                <div class="d-grid gap-2 mt-2">
                    <button type="submit" class="btn btn-outline-success">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

</div>


@endsection