<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        @section('scripts')
            <link rel="dns-prefetch" href="//fonts.gstatic.com">

            <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css" />

            <!-- Styles -->
            <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @show
    </head>
    <body>

        @section('header')
            @include('partials.navbar')
            @include('partials.modals.logout')
        @show

        @section('messages')
            <div class="container pt-3">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br />
                        @endforeach
                    </div>
                @endif

                @if (session()->has('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
            </div>
        @show

        @yield('content')

        @section('footer')
            @include('partials.footer')
        @show

        @section('scripts-after')

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
            

        @show
    </body>
</html>
