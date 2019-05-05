@extends('layouts.app')










@section('content')
<div class="container">
        @if(session('success'))
                <div class="alert alert-success">
                        {{ session('success')}}
                    </div>
        @endif

        <div class="row justify-content-center">
                <div class="col-md-8">
                        <div class="card">
                                <div class="card-header">Aggiungi Attrazione</div>



                                <form method="POST" enctype="multipart/form-data"
                                        action="{{ route('addAttraction.submit') }}">
                                        @csrf

                                        <div class="card-body">
                                                <div class="row">
                                                        <div class="col-12 col-md-6">
                                                                <div class="form-group">

                                                                        <label for="latitude">Latitude</label>
                                                                        <input id="latitude" class="form-control"
                                                                                type="text" name="latitude"
                                                                                label="Latitudine"
                                                                                />
                                                                </div>

                                                                <div class="form-group">

                                                                        <label for="logitude">Longitude</label>
                                                                        <input id="longitude" class="form-control"
                                                                                type="text" name="longitude"
                                                                                label="Longitudine"
                                                                                 />

                                                                </div>
                                                                @foreach(App\Language::get() as $i => $lang)
                                                                <div class="form-group">
                                                                        <label for="name">Nome {{$lang->name}}</label>
                                                                        <input id="name" class="form-control"
                                                                                type="text" name="name{{$lang->code}}" label="nome"
                                                                                 />

                                                                </div>
                                                                
                                                                
                                                                <div class="form-group">
                                                                <label for="description">Descrizione {{$lang->name}}</label>
                                                                <textarea id="description" class="form-control"
                                                                                type="text" name="description{{$lang->code}}"
                                                                                label="Descrizione"></textarea>
                                                                </div>
                                                                @endforeach
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                                <div class="form-group">
                                                                        <input class="form-control-file" type="file"
                                                                                name="image" />


                                                                </div>

                                                        </div>
                                                </div>

                                        </div>

                                        <div class="card-footer">
                                                <div class="float-left">
                                                <a href="{{route('dash')}}"class="btn btn-primary">INDIETRO</a>
                                                </div>
                                                <div class="text-right">
                                                <button class="btn btn-primary text-right" type="submit">CARICA</button>
                                                </div>
                                        </div>
                                </form>





                        </div>
                </div>
        </div>
</div>
@endsection