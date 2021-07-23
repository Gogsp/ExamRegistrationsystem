@extends('main.navbar')

@section('content')
<div class="container">
            <h2 class="text-center">Students</h2>
            <div class="row">
                @forelse ($users as $user)
                <div class="col-12 col-md-8 col-6 mx-auto shadow mb-2">
                    <div style="display: flex; " class="m-2">
                        <img class="m-2 rounded-circle" style="width: 100px; height:100px" src="{{ asset('images/studentImages/'. $user->image_path) }}" alt="">
                        <div class="col-6 col-md-4 mt-2">
                            Name : {{ $user->name }} <br>Index No : {{ $user->index_no }}<br>Email : {{ $user->email }}<br>Department : {{ $user->dept_id}}       
                        </div>   
                        {{-- <div class="col-6 col-md-4" style="display:flex; justify-content:space-evenly">
                            <a href="/users/{{ $user->id }}"><button class="btn btn-outline-info mb-1" >View</button></a><br>
                            <a href="/users/{{ $user->id }}/edit"><button class="btn btn-outline-primary mb-1" >Edit</button></a><br>
                            <form action="/users/{{ $user->id }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-outline-danger" >Delete </button>
                            </form>
                        </div>   --}}
                    </div>    
                </div>
                @empty
                     No users registered yet...   
                @endforelse
            </div>       
</div>

@endsection