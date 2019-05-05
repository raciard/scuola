@extends('layouts.app')

@section('play-now')
    <ul class="navbar-nav">
        <li class="nav-item">
            @include('partials.locale')
        </li>
    </ul>
@endsection

@section('content')
    <div class="container py-5">
        <div class="text-center" id="preview">
            <img src="{{ URL::to('/img/' . $attraction->cover_image) }}" class="mb-3">
            <h3>{{ $attraction->info->name }}</h3>
            <p>
                @lang('game.rules')
            </p>
            <button id="play" class="btn btn-primary">@lang('game.play')</button>
        </div>
        <div id="question" class="d-none">
            <div id="time_display" style="height: 150px; width: 150px;" class="mx-auto mb-5"></div>
            <h4 class="text-center mb-3">{{ $question->question }}</h4>
            <form method="POST" action="{{ route('quiz.sumbit', ['id' => $attraction->id, 'question' => $question->id]) }}" id="submit">
                @csrf
                <input type="hidden" name="time" id="time" value="20">
                <div class="row">
                    <div class="col-12 col-md-6 offset-md-3">
                        @foreach($question->answers as $answer)
                            <label class="card px-4 py-3 d-flex flex-row answer">
                                <input type="radio" class="my-1 mr-3" name="answer" value="{{ $answer->id }}">
                                <span class="d-block w-100">{{ $answer->answer }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts-after')
    <script type="application/javascript" src="https://rawgit.com/kimmobrunfeldt/progressbar.js/1.0.0/dist/progressbar.js"></script>
    <script src="{{ asset('js/quiz.js') }}" defer></script>
    @parent
@endsection