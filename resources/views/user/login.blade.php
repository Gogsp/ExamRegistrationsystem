@extends('main.navbar')

@section('content')

    <div class="col-md-4 offset-4">
        <div class="container" style="margin-top: 200px">
            <h2 class="text-center">Login Form</h2>
            <form method="GET" action="/check">
                @csrf
                @if (Session::get('fail'))
                    <div class="alert alert-danger">{{ Session::get('fail') }}</div>       
                @endif
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Email address</label>
                  <input type="email"  class="form-control" name="email" aria-describedby="emailHelp">
                  <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>


@endsection






    


