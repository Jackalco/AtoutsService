@extends('layouts.master')

@section('head-title')
    Atouts Services - Gestion des prestataires
@endsection

@section('head-meta-description')
    Page gestion des prestataires d'Atouts Services
@endsection

@push('stylesheet')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@endpush

@section('content')
<h1>Gestion des prestataires</h1>
    <h2>Liste des prestataires</h2>
    <div class="listContainer">
    @if(Session::has('success'))
        <div class="alert">
            {{Session::get('success')}}
        </div>
    @endif
    @if(count($providers) == 0)
    <div>Il n'y a, actuellement, aucune sous-catégorie.</div>  
    @else
        @foreach($providers as $provider)
            <div class="listItem">
                <div class="listLogo">
                    <img class="logo" src="{{ asset('storage/imagesUploaded/'.$provider->image->path) }}" alt="Logo de {{$provider->name}}">
                </div>
                <div class="listInfo">
                    <div><strong>Nom : </strong>{{$provider->name}}</div>
                    <div><strong>Adresse : </strong>{{$provider->address}}</div>
                    <div><strong>Ville : </strong>{{$provider->city}}</div>
                    <div><strong>Email : </strong>{{$provider->email}}</div>
                    <div><strong>Propriètaire : </strong>{{$provider->owner}}</div>
                </div>
                <div class="listAction">
                    <form method="post" action="{{ route('admin.provider.delete', $provider->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="buttonAdmin">Supprimer</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
    </div>
@endsection