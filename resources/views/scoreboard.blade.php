@extends('layouts.app')

@section('header')
    <div class="home-wrapper" style="height: 200px;">
        <div class="inner">
            <div class="text-light text-center">
                <h1 class="mb-0">Brundapp</h1>
                <h2>@lang('scoreboard.title')</h2>
            </div>
        </div>
    </div>
    @parent
@endsection

@section('content')
    <div class="container">
        @if ($user)
            <h3 class="text-center mt-5 mb-2">@lang('scoreboard.my_stats')</h3>
            <div class="card card-body mb-3">
                <div class="row">
                    <div class="col-6 col-md-3 text-center">
                        <h6>@lang('scoreboard.total_score')</h6><span>{{ number_format($user->score, 2) }}</span>
                    </div>
                    <div class="col-6 col-md-3 text-center">
                        <h6>@lang('scoreboard.position')</h6><span>{{ $user->position }}</span>
                    </div>
                    <div class="col-6 col-md-3 text-center">
                        <h6>@lang('scoreboard.attractions')</h6><span>{{ $user->attractions()->count() }}</span>
                    </div>
                    <div class="col-6 col-md-3 text-center">
                        <h6>@lang('scoreboard.trips')</h6><span>{{ $user->trips()->count() }}</span>
                    </div>
                </div>
            </div>
        @endif

        <h3 class="text-center mt-5 mb-2">@lang('scoreboard.top_ten')</h3>
        <div class="card mb-5">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">@lang('scoreboard.user')</th>
                        <th class="text-center">@lang('scoreboard.score')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($podium as $i => $entry)
                        <tr class="{{ $user && $entry->id === $user->id ? 'table-primary' : '' }}">
                            <td class="text-center align-middle">{{ $i + 1 }}</td>
                            <td class="align-middle">
                                <img src="{{ $entry->avatar_url }}" height="48" width="48" class="rounded-circle mr-4">
                                <b>{{ $entry->name }}</b>
                            </td>
                            <td class="text-center align-middle">
                                {{ number_format($entry->score, 2) }}
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection