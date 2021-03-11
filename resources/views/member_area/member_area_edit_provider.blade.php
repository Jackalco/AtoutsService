@extends('layouts.master')

@section('head-title')
    Atouts Services - Espace membre pour les prestataires
@endsection

@section('head-meta-description')
    Modification d'un prestataire d'Atouts Services par l'utilisateur propriétaire 
@endsection

@push('stylesheet')
    <link href="{{ asset('css/member_area.css') }}" rel="stylesheet">
@endpush

@section('content')
{{$provider}}
    <h1>Modification des informations de votre entreprise</h1>
    <div class="memberContainer">
        <a href="{{ route('member-area.providers.show', $user->id) }}" class="memberBackButton">Retour</a>
        <form class="formContainer" action="post" method="{{ route('member-area.provider.update', [$user->id, $provider->id]) }}">
            @csrf
            @method('PATCH')

            <div class="formItem">
                <label class="formLabel">Nom de l'entreprise</label>
                <input type="text" class="formInput {{ $errors->has('image') ? 'error' : '' }}" name="name" id="name" value="{{old('name')?? $provider->name}}">
            </div>

            @if($errors->has('category'))
                <div class="error">
                    Ce champ est obligatoire.
                </div>
            @endif

            <div class="formItem">
                <label class="formLabel">Adresse</label>
                <input type="text" class="formInput {{ $errors->has('image') ? 'error' : '' }}" name="address" id="address" value="{{old('name')?? $provider->address}}">
            </div>

            @if($errors->has('category'))
                <div class="error">
                    Ce champ est obligatoire.
                </div>
            @endif

            <div class="formItem">
                <label class="formLabel">Ville</label>
                <input type="text" class="formInput {{ $errors->has('image') ? 'error' : '' }}" name="city" id="city" value="{{old('name')?? $provider->city}}">
            </div>

            @if($errors->has('category'))
                <div class="error">
                    Ce champ est obligatoire.
                </div>
            @endif

            <div class="formItem">
                <label class="formLabel">Téléphone</label>
                <input type="tel" class="formInput {{ $errors->has('image') ? 'error' : '' }}" name="phone" id="phone" value="{{old('name')?? $provider->phone}}">
            </div>

            @if($errors->has('category'))
                <div class="error">
                    Ce champ est obligatoire.
                </div>
            @endif

            <div class="formItem">
                <label class="formLabel">Adresse mail</label>
                <input type="text" class="formInput {{ $errors->has('image') ? 'error' : '' }}" name="email" id="email" value="{{old('name')?? $provider->email}}">
            </div>

            @if($errors->has('category'))
                <div class="error">
                    Ce champ est obligatoire.
                </div>
            @endif

            <div class="formItem">
                <label class="formLabel">Nom du propriétaire de l'entreprise</label>
                <input type="text" class="formInput {{ $errors->has('image') ? 'error' : '' }}" name="owner" id="owner" value="{{old('name')?? $provider->owner}}">
            </div>

            @if($errors->has('category'))
                <div class="error">
                    Ce champ est obligatoire.
                </div>
            @endif

            <div class="formItem">
                <label class="formLabel">Nombre de structure</label>
                <input type="text" class="formInput {{ $errors->has('image') ? 'error' : '' }}" name="structure" id="structure" value="{{old('name')?? $provider->structure}}">
            </div>

            @if($errors->has('category'))
                <div class="error">
                    Ce champ est obligatoire.
                </div>
            @endif

            <div class="formItem">
                <label class="formLabel">Effectif</label>
                <input type="text" class="formInput {{ $errors->has('image') ? 'error' : '' }}" name="workforce" id="workforce" value="{{old('name')?? $provider->workforce}}">
            </div>

            @if($errors->has('category'))
                <div class="error">
                    Ce champ est obligatoire.
                </div>
            @endif

            <div class="formItem">
                <label class="formLabel">Numéro de SIRET</label>
                <input type="text" class="formInput {{ $errors->has('image') ? 'error' : '' }}" name="siret" id="siret" value="{{old('name')?? $provider->siret}}">
            </div>

            @if($errors->has('category'))
                <div class="error">
                    Ce champ est obligatoire.
                </div>
            @endif

            <div class="formItem">
                <label class="formLabel">Description de l'entreprise (optionnel)</label>
                <textarea class="formInput {{ $errors->has('image') ? 'error' : '' }}" name="description" id="description"></textarea>
            </div>

            @if($errors->has('category'))
                <div class="error">
                    Ce champ est obligatoire.
                </div>
            @endif

            <div class="formItem">
                <label class="formLabel">Choississez le thème pour votre entreprise (optionnel)</label>
                <input type="color" class="formInput {{ $errors->has('image') ? 'error' : '' }}" name="color" id="color">
            </div>

            @if($errors->has('category'))
                <div class="error">
                    Ce champ est obligatoire.
                </div>
            @endif

            <div class="formItem">
                <label class="formLabel">Logo de l'entreprise (optionnel)</label>
                <input type="file" accept=".png, .jpg" class="formInput {{ $errors->has('image') ? 'error' : '' }}" name="image" id="image">
            </div>

            @if($errors->has('category'))
                <div class="error">
                    Ce champ est obligatoire.
                </div>
            @endif

        </form>
    </div>
@endsection