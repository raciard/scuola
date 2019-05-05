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
        <div id="question">
            <div style="height: 150px; width: 150px;" class="mx-auto text-center mb-5">
                @if ($points > 0)
                    <i class="far fa-5x text-success fa-smile-wink"></i>
                @else
                    <i class="far fa-5x text-danger fa-sad-tear"></i>
                @endif
                <h4 class="mt-2">@lang('game.points', ['points' => $points])</h4>
            </div>
            <h4 class="text-center mb-3">{{ $question->question }}</h4>
            <form method="POST" action="{{ route('quiz.sumbit', ['id' => $attraction->id, 'question' => $question->id]) }}" id="submit">
                @csrf
                <input type="hidden" name="time" id="time" value="20">
                <div class="row">
                    <div class="col-12 col-md-6 offset-md-3">
                        @foreach($question->answers as $answer)
                            <label class="card px-4 py-3 d-flex flex-row {{ $answer->correct ? 'bg-success text-light' : '' }} {{ $user_answer && $user_answer->id === $answer->id && !$answer->correct ? 'bg-danger' : '' }}">
                                <input type="radio" disabled class="my-1 mr-3" name="answer" value="{{ $answer->id }}">
                                <span class="d-block w-100">{{ $answer->answer }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </form>
        </div>
        <div class="text-center">
            <a href="{{ route('play') }}" class="btn btn-primary my-3">
                <i class="fas fa-play mr-2"></i><span>@lang('game.play_again')</span>
            </a>
        </div>
    </div>
@endsection

@section('scripts-after')
    <script type="application/javascript" src="https://rawgit.com/kimmobrunfeldt/progressbar.js/1.0.0/dist/progressbar.js"></script>

    @parent
@endsection