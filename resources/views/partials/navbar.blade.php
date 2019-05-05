<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">

    <div class="container py-3">

        <a class="navbar-brand mr-3" href="/">
            <i class="fas fa-dragon text-light"></i>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">@lang('nav.link_home')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('scoreboard') }}">@lang('nav.link_scoreboard')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile') }}">@lang('nav.link_profile')</a>
                </li>
            </ul>

            @if (!Auth::guest())

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#logout">@lang('nav.link_logout')</a>
                    </li>
                </ul>

                @section('play-now')
                    <form class="form-inline">
                        <a class="btn btn-primary" href="{{ route('play') }}"><i class="fas fa-play mr-2"></i>@lang('nav.link_play')</a>
                    </form>
                @show

            @else

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">@lang('nav.link_login')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">@lang('nav.link_register')</a>
                    </li>
                </ul>

            @endif

        </div>

    </div>

</nav>