@extends('main.navbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 m-4" >
            <div style="text-align:center">
                <h1  style="display:inline-block;">University Exam Registration Application</h1>
                
                @if(session()->get('userId') == 1)
                    <a href="/universities/create" style="float: right;"><button class="btn btn-outline-success mt-4">Add University</button></a>
                @endif
            </div>
        
            @forelse ($universities as $university )
                  <div class="card mt-4">
                    <a href="universities/{{ $university->id }}" style="text-align: center" >
                    <img class="card-img-top px-2 pt-2" src="{{ asset('images/universityLogo/'. $university->logo) }}"
                        alt="{{ $university->name }}" style="height: 200px; width:250px;align-self: center" >
                    </a>
                    <div class="card-body">
                        <a href="universities/{{ $university->id }}" style="text-decoration: none;" ><h5 style=" text-align:center;">
                        {{ $university->name }}
                        </h5></a>
                        <p class="card-text" >{{ $university->description }}</p>
                    </div>
                  </div>
                   
                @empty
                    <div>
                        <p>No Universities Added yet</p>
                    </div>
                @endforelse
            </div>
    </div>
</div>

@endsection



