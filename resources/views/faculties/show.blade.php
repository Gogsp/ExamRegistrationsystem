@extends('main.navbar')

@section('content')
<div class="container">
  
    <div class="row">
        <div class="col-sm-6 mt-3" style="text-align: end" >
            <h1 class="m-3" style="font-weight: bold; display:inline-block">Faculty of {{ $faculty->name }}</h1>
            <a href="/universities/{{ $university->id }}" class="m-4" style="float: left"><button class="btn btn-outline-dark">Back</button></a>

        </div>
        <hr >
        <div class="col-12 col-md-6 col-lg-6 mt-4">
            <h3>Departments</h3>  
            <table class="table">
                <tbody>
                    
                @forelse ($faculty->getDepartments as $department )
                <tr>
                   <td class="col-9">{{ $department->name }}</td>
                   <td class="col-1">
                    <a href="/departments/{{ $department->id }}"><button type="submit" class="btn btn-outline-info btn-sm">
                        View 
                    </button></a>
                   </td>
                   @if(session()->get('userId') == 1)
                   <td class="col-1">
                    <a href="/departments/{{ $department->id }}/edit"><button type="submit" class="btn btn-outline-primary btn-sm">
                        Edit
                    </button></a>
                   </td>

                    <td class="col-1">
                        <form action="/departments/{{ $department->id }}" method="POST" >
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                Delete
                            </button>
                        </form>
                    </td>
                    @endif
                @empty
                    <td>No Department added yet</td>
                @endforelse
                    </tr>
                </tbody>
            </table>
        </div>

        @if(session()->get('userId') == 1)
        <div class="col-12 col-md-6 col-lg-4 offset-1 mt-4">
            <h4>Add Department</h4>
            <form method="POST" action="/departments">
                @csrf
                <div class="form-group mt-4 mb-2">
                    <label>Department Name </label>
                    <input type="text" class="form-control mt-2" name="name" id="" placeholder="Name of the Department">
                    <input type="text" class="form-control mt-2" name="facid" id="" value="{{ $faculty->id }}" hidden>
                </div>
                <div class="d-grid gap-2 mt-2 mb-2">
                    <button type="submit" class="btn btn-outline-success mt-2">Add Department</button>
                </div>
            </form>
            <div class="mt-4">
                <h4>Add Student</h4>
                <a href="/users/create/{{ $faculty->id }}"><button class="btn btn-outline-dark">Add Student</button></a>
            </div>

        </div>
        @endif
    </div>
      
 
</div>



@endsection