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
    <div class="providerContainer">
        <a href="{{ route('member-area') }}" class="memberBackButton">Retour</a>
        <h2>Vos prestataires</h2>
        <hr>
        @if(Session::has('success'))
            <div class="alert">
                {{Session::get('success')}}
            </div>
        @endif
        @if(Session::has('error'))
            <div class="error">
                {{Session::get('error')}}
            </div>
        @endif
        
        @if(count($providers) == 0)
            <div>Vous n'avez, actuellement, pas d'entreprise inscrit à Atouts Services.</div>
        @else
            @foreach($providers as $provider)
                <h3>{{$provider->name}}</h3>
                <div class="providerItem">
                    <div class="providerInfo"><strong>Adresse :</strong> {{$provider->address}}</div>
                    <div class="providerInfo"><strong>Ville :</strong> {{$provider->city}}</div>
                    <div class="providerInfo"><strong>Téléphone :</strong> {{$provider->phone}}</div>
                    <div class="providerInfo"><strong>Adresse mail :</strong> {{$provider->email}}</div>
                    <div class="providerInfo"><strong>Propriétaire :</strong> {{$provider->owner}}</div>
                    <div class="providerInfo"><strong>Nombre de structures :</strong> {{$provider->structure}}</div>
                    <div class="providerInfo"><strong>Effectif :</strong> {{$provider->workforce}}</div>
                    <div class="providerInfo"><strong>Activité :</strong> {{$provider->activity}}</div>
                    <div class="providerInfo"><strong>Numéro de SIRET :</strong> {{$provider->siret}}</div>
                    <form method="get" action="{{ route('member-area.provider.edit', [$user->id, $provider->id]) }}">
                        <button class="memberSubmitButton">Modifier</button>
                    </form>
                    <form method="post" action="{{ route('member-area.provider.delete', [$user->id, $provider->id]) }}">
                        @csrf
                        @method('DELETE')

                        <button class="memberSubmitButton" type="submit">Supprimer</button>
                    </form>
                </div>
                
                <hr>
            @endforeach
        @endif
    </div>
@endsection