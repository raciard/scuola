@extends('layouts.app')

@section('content')
<div class="container">
<div class="card-columns">
        @foreach ($attractions as $attraction)
            <div class="card mb-3">
                <img src="{{ URL::to('img/' . $attraction->cover_image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $attraction->info->name }}</h5>
                    <p class="card-text">{{ $attraction->info->description }}</p>
                    <a href="{{ route('editAttraction',[$attraction->id]) }}" class="btn btn-primary">Modifica Info</a>
                    <a href="" class="btn btn-primary">Modifica Quiz</a>
                    <p class="text-muted mb-0 mt-2" style="font-size: 80%">{{ $attraction->categories->join(", ") }}</p>
                
                </div>
            </div>
        @endforeach
    </div>
    <a href="{{route("addAttraction")}}" class="btn btn-secondary">Aggiungi attrazione</a>
</div>
@endsection