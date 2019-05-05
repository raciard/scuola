@extends("layouts.app")

@section('header')
    <div class="home-wrapper" style="height: 200px;">
        <div class="inner">
            <div class="text-light text-center">
                <h1 class="mb-0">Brundapp</h1>
                <h2>@lang('profile.title')</h2>
            </div>
        </div>
    </div>
    @parent
@endsection


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="card mb-3">
                    <div class="card-header">@lang('profile.summary')</div>
                    <div class="card-body d-flex flex-row">
                        <div class="d-block">
                            <h3>{{ $user->name }}</h3>
                            <i>@lang('profile.score', ['score' => number_format($user->score, 2)])</i>
                        </div>
                        <div class="ml-auto">
                            <img src="{{ $user->avatar_url }}" height="64" width="64" class="rounded-circle">
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        Settings
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.submit') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">@lang('fields.email')</label>
                                <div class="col-sm-8">
                                    <input type="text" readonly class="form-control" id="email" value="{{ $user->email }}">
                                    <small id="emailHelp" class="form-text text-muted">@lang('profile.email_tip')</small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label">@lang('fields.name')</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">@lang('profile.save')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card mb-3">
                    <div class="card-header">@lang('profile.password')</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.submit') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="password" class="col-sm-4 col-form-label">@lang('fields.password')</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password_confirmation" class="col-sm-4 col-form-label">@lang('fields.password_confirm')</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">@lang('profile.save')</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">@lang('profile.social')</div>
                    <div class="card-body">
                        @foreach (['facebook', 'google'] as $provider)
                            <div class="d-flex mb-2">
                                <span class="d-block py-2">{{ ucfirst($provider) }}</span>
                                <div class="ml-auto">
                                    @if ($user->socials()->where('provider', $provider)->first())
                                        <a href="#" class="btn btn-{{ $provider }} disabled">
                                            <i class="fas fa-check"></i>
                                            <span>Linked with {{ ucfirst($provider) }}</span>
                                        </a>
                                    @else
                                        <a href="{{ route('login.provider', ['provider' => $provider]) }}" class="btn btn-{{ $provider }}">
                                            <i class="fab fa-{{ $provider }} mr-2"></i>
                                            <span>Link with {{ ucfirst($provider) }}</span>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection