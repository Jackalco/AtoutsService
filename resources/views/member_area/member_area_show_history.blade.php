@extends('layouts.master')

@section('head-title')
    Atouts Services - Espace membre pour les prestataires
@endsection

@section('head-meta-description')
    Historique de l'utilisateur sur le site Atouts Services.
@endsection

@push('stylesheet')
    <link href="{{ asset('css/member_area.css') }}" rel="stylesheet">
@endpush

@section('content')
    <h1>Espace membre</h1>
    <div class="historyContainer">
        <a href="{{ route('member-area') }}" class="memberBackButton">Retour</a>
        <h2>Votre historique</h2>
        @if(Session::has('success'))
            <div class="alert">
                {{Session::get('success')}}
            </div>
        @endif
        @if(count($histories) == 0)
            <div>Votre historique est vide.</div>
        @else
            @foreach($histories as $history)
                <div class="historyItem">
                    <h3>{{$history->provider->name}}</h3>
                    <div class="historyInfo">
                        <div><strong>Secteur :</strong> {{$history->provider->activity}}</div>
                        <div><strong>Adresse :</strong> {{$history->provider->address}}, {{$history->provider->city}}</div>
                        <form method="get" action="{{ route('provider.show', $history->provider_id) }}">
                            <button type="submit" class="formButton">En savoir plus</button>
                        </form>
                        <form method="post" action="{{ route('member-area.history.delete', [$user->id, $history->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="formButton">Supprimer</button>
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection