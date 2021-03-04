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
            <form class="formList" enctype="multipart/form-data" method="post" action="">
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
                    <label>Date de naissance</label>
                    <input class="formInput {{ $errors->has('date') ? 'error' : '' }}" type="date" name="date" id="date">

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
                    <label>Nom de structure</label>
                    <input class="formInput {{ $errors->has('company') ? 'error' : '' }}" type="text" name="company" id="company">

                    @if ($errors->has('company'))
                        <div class="error">
                            Ce champ est obligatoire.
                        </div>
                    @endif
                </div>
                <div class="formItem">
                    <label>Activité</label>
                    <input class="formInput {{ $errors->has('activity') ? 'error' : '' }}" type="text" name="activity" id="activity">

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
                <div>
                    <a href="{{ route('make.payment') }}" >Pay $224 via Paypal</a>
                </div>
                <div class="formItem">
                    <button type="submit" class="formButton">Envoyer</button>
                </div>

            </form>
        </div>
    </div>
@endsection