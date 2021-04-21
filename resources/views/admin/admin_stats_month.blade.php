@extends('layouts.master')

@section('head-title')
    Atouts Services - Statistiques du mois
@endsection

@section('head-meta-description')
    Statistiques du mois des prestataires d'Atouts Services.
@endsection

@push('stylesheet')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@endpush

@section('content')
    <h1>Statistiques du mois</h1>
    <div class="statsContainer">
        <a href="{{ route('admin.stats.year') }}" class="buttonAdmin">Voir statistiques de l'année</a>
        <table class="statsItem">
            <tr>
                <td><strong>Nom du prestataire</strong></td>
                <td><strong>Nombre de vues</strong></td>
                <td><strong>Fin de l'abonnement</strong></td>
                <td><strong>Note</strong></td>
            </tr>
            @foreach($providersDetails as $provider)
                <tr>
                    <td>{{$provider->name}}</td>
                    <td>Vues : {{$provider->count}}</td>
                    <td>
                        @if($provider->end_date > $today)
                            {{$provider->end_date}}
                        @else
                            Non abonné
                        @endif
                    </td>
                    <td>
                        @if($provider->average() == null)
                            Pas de note
                        @else
                            {{$provider->average()}}
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    
@endsection