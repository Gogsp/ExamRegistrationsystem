@extends('main.navbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto mb-3 mt-4">
            <h4 style="display: ">Add Faculty</h4>
            <a href="/universities"><h5>Back</h5></a>
            <form method="POST" action="/faculties" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-4 mb-2">
                    <label>Faculty Name </label>
                    <input type="text" class="form-control mt-2" name="name" id="" placeholder="Name of the Faculty">
                    
                </div>
                <div class="d-grid gap-2 mt-2 mb-2">
                    <button type="submit" class="btn btn-success mt-2">Add Faculty</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection