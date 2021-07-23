@extends('main.navbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto mb-3 mt-4">
            <div>
            <h4 style="display: inline-block">Add University</h4>
            <a href="/universities">
                <button style="float: right" class="btn btn-outline-secondary " >Back</button></a>
            </div>
            <form method="POST" action="/universities" enctype="multipart/form-data">
                @csrf
                <div class="form-group mt-4 mb-2">
                    <input type="text" class="form-control mt-2" name="uniname" id="" placeholder="Name of the University">
                </div>
                <div class="form-group mt-1 mb-2">
                    <pre><label> University Logo : </label><input type="file" name="logo_path" class="form-control-file mt-2"></pre>
                </div>
                <div class="form-group mt-1 mb-2">
                    <label>Description</label>
                    <textarea name="desc" rows="5" class="form-control mt-2"></textarea>
                </div>
                <div class="d-grid gap-2 mt-2 mb-2">
                    <button type="submit" class="btn btn-success mt-2">Add University</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection