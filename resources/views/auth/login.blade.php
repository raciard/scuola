@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('auth.login_title')</div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-12 col-md-6">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="email">@lang('fields.email')</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">@lang('fields.password')</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">@lang('auth.login_remember')</label>
                                </div>

                                <button type="submit" class="btn btn-primary mb-3">@lang('auth.login_button')</button>

                            </form>
                        </div>

                        <div class="col-12 col-md-6">
                            <p>
                                @lang('auth.login_social_networks')
                            </p>
                            <a href="{{ route('login.provider', ['provider' => 'google']) }}" class="btn btn-google w-100 mb-2">
                                <i class="fab fa-google mr-2"></i><span>@lang('auth.login_with', ['provider' => 'Google'])</span>
                            </a>
                            <a href="{{ route('login.provider', ['provider' => 'facebook']) }}" class="btn btn-facebook w-100 mb-2">
                                <i class="fab fa-facebook mr-2"></i><span>@lang('auth.login_with', ['provider' => 'Facebook'])</span>
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-secondary w-100 mb-2">@lang('auth.login_sign_up')</a>
                            <a href="{{ route('password.request') }}" class="btn btn-link w-100 mb-2">@lang('auth.login_forgot')</a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
