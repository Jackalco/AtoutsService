@extends('layouts.master')

@section('head-title')
    Atouts Services - Espace membre pour les prestataires
@endsection

@section('head-meta-description')
    Présentation des différents prestataires possédés par l'utilisateur d'Atouts Services
@endsection

@push('stylesheet')
    <link href="{{ asset('css/member_area.css') }}" rel="stylesheet">
@endpush

@section('content')
    <h1>Espace membre</h1>
    <div class="memberContainer">
        <a href="{{ route('member-area') }}" class="memberBackButton">Retour</a>
        <h2>Vos prestataires</h2>
        <hr>
        @if(count($providers) == 0)
            <div>Nope</div>
        @else
            @foreach($providers as $provider)
                <h3>{{$provider->name}}</h3>
                <div class="memberItem">
                    <div class="providerItem"><strong>Adresse :</strong>{{$provider->address}}</div>
                    <div class="providerItem"><strong>Ville :</strong>{{$provider->city}}</div>
                    <div class="providerItem"><strong>Téléphone :</strong>{{$provider->phone}}</div>
                    <div class="providerItem"><strong>Adresse mail :</strong>{{$provider->email}}</div>
                    <div class="providerItem"><strong>Propriétaire :</strong>{{$provider->owner}}</div>
                    <div class="providerItem"><strong>Nombre de structures :</strong>{{$provider->structure}}</div>
                    <div class="providerItem"><strong>Effectif :</strong>{{$provider->workforce}}</div>
                    <div class="providerItem"><strong>Activité :</strong>{{$provider->activity}}</div>
                    <div class="providerItem"><strong>Numéro de SIRET :</strong>{{$provider->siret}}</div>
                </div>
                <form method="get" action="{{ route('member-area.provider.edit', [$user->id, $provider->id]) }}">
                    <button class="memberSubmitButton">Modifier</button>
                </form>
                <form method="post" action="{{ route('member-area.provider.delete', [$user->id, $provider->id]) }}">
                    @csrf
                    @method('DELETE')

                    <button class="memberSubmitButton" type="submit">Supprimer</button>
                </form>
                <hr>
            @endforeach
        @endif
        {{$providers}}
    </div>
@endsection