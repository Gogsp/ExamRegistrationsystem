@extends('main.navbar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-10">
            <h1 class="mt-4">Faculties of Universities</h1>
            @forelse ($universities as $university)
                <h2>{{ $university->name }}</h2>
                @forelse ($university->getFaculties() as $faculty )
                    <ul>
                        <li><h6><a href="/faculties/{{ $faculty->id }}" style="text-decoration: none">{{ $faculty->name }}</a></h6></li>
                    </ul>
                @empty
                    {{-- if no faculty there --}}
                @endforelse
            @empty
                {{-- if no university there --}}
            @endforelse
            
        </div>
    </div>
</div>

@endsection