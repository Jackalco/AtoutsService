@extends('layouts.master')

@section('head-title')
    Atouts Services - {{$provider->name}}
@endsection

@section('head-meta-description')
    Informations sur {{$provider->name}}.
@endsection

@push('stylesheet')
    <link href="{{ asset('css/provider.css') }}" rel="stylesheet">
@endpush

@section('content')
    <header><h1>{{$provider->name}}</h1> <img class="providerLogo" src="{{ asset('storage/imagesUploaded/'.$provider->image->path) }}" alt="Logo de {{$provider->name}}"></header>
    <div class="providerContainer">
        <h2>Informations utiles</h2>
        <div class="providerContainerInfo">
            <div class="providerItem">
                <div class="providerIcon"><i class="fas fa-phone" style="color: {{$provider->color}}"></i></div>
                <div class="providerInfo">
                    <div class="providerFillInfo">Téléphone</div>
                    <div>{{$provider->phone}}</div>
                </div>
            </div>
            <div class="providerItem">
                <div class="providerIcon"><i class="fas fa-at" style="color: {{$provider->color}}"></i></div>
                <div class="providerInfo">
                    <div class="providerFillInfo">Adresse mail</div>
                    <div>{{$provider->email}}</div>
                </div>
            </div>
            <div class="providerItem">
                <div class="providerIcon"><i class="fas fa-home" style="color: {{$provider->color}}"></i></div>
                <div class="providerInfo">
                    <div class="providerFillInfo">Adresse</div>
                    <div>{{$provider->address}}, {{$provider->city}}</div>
                </div>
            </div>
            <div class="providerItem">
                <div class="providerIcon"><i class="fas fa-list" style="color: {{$provider->color}}"></i></div>
                <div class="providerInfo">
                    <div class="providerFillInfo">Secteur</div>
                    <div>{{$provider->activity}}</div>
                </div>
            </div>
            <div class="providerItem">
                <div class="providerIcon"><i class="fas fa-user-alt" style="color: {{$provider->color}}"></i></div>
                <div class="providerInfo">
                    <div class="providerFillInfo">Propriétaire</div>
                    <div>{{$provider->owner}}</div>
                </div>
            </div>
        </div>      
    </div>
    <div class="providerContainer">
        <h2>Présentation</h2>
        @if($provider->description == null)
        <p>Le prestataire n'a pas encore mis de description.</p>
        @else
        <p>{{$provider->description}}</p>
        @endif
    </div>
    <div class="providerContainer">
        <h2>Note</h2>
        @if($score == null)
            <p>Ce prestataire n'a pas encore reçu de note. Soyez le premier l'évaluer !</p>
        @else
            <div>{{$score}} / 5</div>
        @endif
        @if(!App\Models\User::auth())
            <p>Vous devez être connecté pour pouvoir évaluer ce prestataire.</p>
        @elseif(App\Models\User::auth())
            <form method action="">
                <button type="submit">Notez</button>
            </form>
        @endif
    </div>
@endsection