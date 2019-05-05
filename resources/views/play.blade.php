@extends('layouts.app')

@section('play-now')
    <ul class="navbar-nav">
        <li class="nav-item">
            @include('partials.locale')
        </li>
    </ul>
@endsection

@section('content')
    <div class="container">
        <div class="card mb-3">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('play') }}">@lang('game.all')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?completed=1">@lang('game.completed')</a>
                </li>
                @foreach($categories as $category)
                <li class="nav-item">
                    <a class="nav-link" href="?category_id={{$category->id}}">{{ $category->info->name }}</a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="card-columns">
            @foreach ($attractions as $attraction)
                <div class="card mb-3">
                    <img src="{{ URL::to('img/' . $attraction->cover_image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $attraction->info->name }}</h5>
                        <p class="card-text">{{ $attraction->info->description }}</p>
                        @if ($user->attractions()->where('id', $attraction->id)->count() == 0)
                            <a href="{{ route('quiz', ['id' => $attraction->id]) }}" class="btn btn-primary">@lang('game.do_quiz')</a>
                        @endif
                        <p class="text-muted mb-0 mt-2" style="font-size: 80%">{{ $attraction->categories->join(", ") }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="">
            {{ $attractions->links() }}
        </div>
    </div>
@endsection
