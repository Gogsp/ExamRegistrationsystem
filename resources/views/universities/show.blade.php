@extends('main.navbar')

@section('content')
<div class="container-fluid">
    <a href="/universities" style="float: left"><button class="btn btn-outline-dark mt-3">Back</button></a>
    <div class="col-sm-4 offset-4 mt-3">
        <h1 class="mt-3" style="display: inline-block">{{ $university->name }}</h1>
    </div>
   {{-- @forelse ($news as $snews)
       {{ $snews->title }}
       <img src="{{ asset('images/newsImages/'.$snews->image ) }}" class="d-block w-100" alt="...">
   @empty
       
   @endforelse --}}

    {{-- <div id="carouselExampleControls" class="carousel slide mt-4" data-bs-ride="carousel">
        <div class="carousel-inner " style="width: 100%; height:700px">
            <div class="carousel-item active">
                <img src="{{ asset('images/background/IGraduation.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/background/collagehouse.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/background/tree.jpg') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> --}}
</div>
<div class="container">
    <hr class="m-4">
    <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card mt-2">
                <img class="card-img-top px-2 pt-2" src="{{ asset('images/universityLogo/'. $university->logo) }}"
                    alt="{{ $university->name }}">
                <div class="card-body">
                    <h5>{{ $university->name }}</h5>
                    <p class="card-text">{{ $university->description }}</p>
                </div>
                {{-- <a class="text-right mr-2" href="https://cmb.ac.lk/">Visit Website</a> --}}
            </div>    
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <h5>Faculties</h5>
            <table class="table">
                <tbody>
                    <tr>
                        @forelse ($university->getFaculties() as $faculty) 
                        <td class="col-sm-6">
                            {{ $faculty->name }}
                        </td>
                        <td class="col-sm-2">
                            <a href="/faculties/{{ $faculty->id }}"><button  class="btn btn-outline-info btn-sm">
                                View
                            </button></a>
                        </td>
                        @if(session()->get('userId') == 1)
                       
                        <td class="col-sm-2">
                            <a href="/faculties/{{ $faculty->id }}/edit"><button  class="btn btn-outline-primary btn-sm">
                                Edit
                            </button></a>
                        </td>
                        <div>
                            <td class="col-sm-2">
                                <form action="/faculties/{{ $faculty->id }}" method="POST" >
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </div> 
                        @endif        
                    </tr>
                    @empty
                    <p>No Faculties added</p>
                    @endforelse
                    
                </tbody>

            </table>
        </div>

        @if(session()->get('userId') == 1)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="mb-4">
                <h4>Add Faculty</h4>
                <form method="POST" action="/faculties">
                    @csrf
                    <div class="form-group mt-2 mb-2">
                        <label>Faculty Name </label>
                        <input type="text" class="form-control mt-2" name="name" id="" placeholder="Name of the Faculty">
                        <input type="text" class="form-control mt-2" name="uniid" id="" value="{{ $university->id }}" hidden>
                    </div>
                    <div class="d-grid gap-2 mt-2 mb-2">
                        <button type="submit" class="btn btn-outline-success mt-2">Add Faculty</button>
                    </div>
                </form>
            </div>


            {{-- <div class="mt-4">
                <h4>Add News</h4>
                <form method="POST" action="/news" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-2 mb-2">
                        <label>Title : </label>
                        <input type="text" class="form-control mt-2" name="title" id="" placeholder="Title of the News">
                        <label>Description : </label>
                        <textarea type="text" class="form-control mt-2" name="desc" id="" placeholder="Description"></textarea>
                        <input type="text" class="form-control mt-2" name="uniId" id="" value="{{ $university->id }}" hidden>
                        <label>Related Image</label>
                        <input type="file" class="form-control mt-2" name="image" id="">
                    </div>
                    <div class="d-grid gap-2 mt-2 mb-2">
                        <button type="submit" class="btn btn-outline-success mt-2">Add News</button>
                    </div>
                </form>
            </div> --}}

           
        </div>

 
        <div class="mt-2 mb-2">
            <div class="mt-2 mb-2">
                <a href= "/universities/{{ $university->id }}/edit"><button style="width: 32%" class="btn btn-outline-primary">Edit University Details</button></a>
            </div>

            <form action="/universities/{{ $university->id }}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-outline-danger" style="width: 32%" >Delete University</button>
            </form>
        </div>
        @endif

    
</div>



@endsection

