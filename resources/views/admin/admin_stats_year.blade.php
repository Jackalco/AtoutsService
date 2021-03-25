@extends('layouts.master')

@section('head-title')
    Atouts Services - Statistiques de l'année
@endsection

@section('head-meta-description')
    Statistiques de l'année des prestataires d'Atouts Services.
@endsection

@push('stylesheet')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@endpush

@section('content')
    <h1>Statistiques de l'année</h1>
    <div class="statsContainer">
        <a href="{{ route('admin.stats.month') }}" class="buttonAdmin">Voir statistiques du mois</a>
            <table class="statsItem">
                <tr>
                    <td><strong>Nom du prestataire</strong></td>
                    <td><strong>Nombre de vues</strong></td>
                    <td><strong>Note</strong></td>
                </tr>
                @foreach($providersDetails as $provider)
                <tr>
                    <td>{{$provider->name}}</td>
                    <td>Vues : {{$provider->count}}</td>
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