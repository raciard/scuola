@extends('layouts.app')

@section('header')
    <div class="home-wrapper">
        <div class="inner">
            <div class="text-light text-center">
                <i class="fas fa-6x fa-dragon"></i>
                <h1 class="mt-3 mb-0">Brundapp</h1>
                <h5 class="mb-5">One time experience</h5>

                <a href="{{ route('play') }}" class="btn btn-primary">
                    <i class="fas fa-play mr-2"></i><span>@lang('nav.link_play')</span>
                </a>
                <span class="text-light mt-1 font-italic d-block" style="font-size: 70%;">
                    A project made possible by <a href="//gablab.eu">GabLab</a>
                </span>
            </div>
        </div>
    </div>
    @parent
@endsection

@section('messages')

@endsection

@section('footer')

@endsection

