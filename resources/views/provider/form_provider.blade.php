@extends('layouts.master')

@section('head-title')
    Atouts Services - Devenir prestataire
@endsection

@section('head-meta-description')
    Devenez prestatataire chez Atouts Services
@endsection

@push('stylesheet')
    <link href="{{ asset('css/provider.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="formBackground">
        <div class="formContainer">
            <header>
                <img src="{{ asset('images/logo.png') }}" alt="Logo Atouts Services" class="formLogo">
                <h1>FORMULAIRE PRESTATAIRE</h1>
            </header>
            @if(Session::has('success'))
                <div class="alert">
                    {{Session::get('success')}}
                </div>
            @endif
            <form class="formList" enctype="multipart/form-data" method="post" action="{{ route('form-provider.apply', $user->id) }}">
            @csrf
                <div class="formItem">
                    <label>Nom</label>
                    <input class="formInput {{ $errors->has('name') ? 'error' : '' }}" type="text" name="name" id="name">

                    @if ($errors->has('name'))
                        <div class="error">
                            Ce champ est obligatoire.
                        </div>
                    @endif
                </div>
                <div class="formItem">
                    <label>Adresse</label>
                    <input class="formInput {{ $errors->has('address') ? 'error' : '' }}" type="text" name="address" id="address">

                    @if ($errors->has('address'))
                        <div class="address">
                            Ce champ est obligatoire.
                        </div>
                    @endif
                </div>
                <div class="formItem">
                    <label>Ville</label>
                    <input class="formInput {{ $errors->has('city') ? 'error' : '' }}" type="text" name="city" id="city">

                    @if ($errors->has('city'))
                        <div class="city">
                            Ce champ est obligatoire.
                        </div>
                    @endif
                </div>
                <div class="formItem">
                    <label>Téléphone</label>
                    <input class="formInput {{ $errors->has('phone') ? 'error' : '' }}" type="text" name="phone" id="phone">

                    @if ($errors->has('phone'))
                        <div class="error">
                            Ce champ est obligatoire.
                        </div>
                    @endif
                </div>
                <div class="formItem">
                    <label>Adresse mail</label>
                    <input class="formInput {{ $errors->has('email') ? 'error' : '' }}" type="text" name="email" id="email">

                    @if ($errors->has('email'))
                        <div class="error">
                            Ce champ est obligatoire.
                        </div>
                    @endif
                </div>
                <div class="formItem">
                    <label>Date de création de l'entreprise</label>
                    <input class="formInput {{ $errors->has('date') ? 'error' : '' }}" type="month" name="date" id="date">

                    @if ($errors->has('date'))
                        <div class="error">
                            Ce champ est obligatoire.
                        </div>
                    @endif
                </div>
                <div class="formItem">
                    <label>Numéro de SIRET</label>
                    <input class="formInput {{ $errors->has('siret') ? 'error' : '' }}" type="text" name="siret" id="siret">

                    @if ($errors->has('siret'))
                        <div class="error">
                            Ce champ est obligatoire.
                        </div>
                    @endif
                </div>
                <div class="formItem">
                    <label>Secteur d'activité</label>
                    <select class="formInput {{ $errors->has('activity') ? 'error' : '' }}" type="text" name="activity" id="activity">
                        <option value="">Choississez un secteur d'activité</option>
                        @foreach($categories as $category)
                        <option value="{{$category->name}}">{{$category->name}}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('activity'))
                        <div class="error">
                            Ce champ est obligatoire.
                        </div>
                    @endif
                </div>
                <div class="formItem">
                    <label>Effectif</label>
                    <input class="formInput {{ $errors->has('workforce') ? 'error' : '' }}" type="text" name="workforce" id="workforce">

                    @if ($errors->has('workforce'))
                        <div class="error">
                            Ce champ est obligatoire.
                        </div>
                    @endif
                </div>
                <div class="formItem">
                    <label>Nombre de structure</label>
                    <input class="formInput {{ $errors->has('structure') ? 'error' : '' }}" type="text" name="structure" id="structure">

                    @if ($errors->has('structure'))
                        <div class="error">
                            Ce champ est obligatoire.
                        </div>
                    @endif
                </div>
                <div class="formItem">
                    <label>Propriétaire</label>
                    <input class="formInput {{ $errors->has('owner') ? 'error' : '' }}" type="text" name="owner" id="owner">

                    @if ($errors->has('owner'))
                        <div class="error">
                            Ce champ est obligatoire.
                        </div>
                    @endif
                </div>
                <div class="formItem">
                    <label>Logo</label>
                    <input type="file" accept=".png, .jpg" class="formInput {{ $errors->has('image') ? 'error' : '' }}" name="image" id="image">

                    @if ($errors->has('image'))
                    <div class="error">
                        Ce champ est obligatoire.
                    </div>
                    @endif
                </div>
                <div class="formItem">
                    <div>
                        <input type="checkbox" name="rules" id="rules" value="checked">
                        <label for="rules">Vous attestez avoir lu et approuvé <a href="">le réglement d'Atouts Services</a></label>
                    </div>
                    
                </div>
                <div class="formItem">
                    <button type="submit" class="formButton">Envoyer</button>
                </div>

            </form>
        </div>
    </div>
@endsection