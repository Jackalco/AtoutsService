@extends('layouts.master')

@section('head-title')
    Atouts Services - Accueil
@endsection

@section('head-meta-description')
    Page de réinitialisation de mot de passe d'Atouts Services
@endsection

@push('stylesheet')
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@endpush

@section('content')

                

<div class="authContainer">
    <h1>Réinitialisation du mot de passe</h1>
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="authItem">
                <label for="email" class="authLabel">Adresse mail</label>
                <input id="email" type="email" class="authInput @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="authItem">
                <label for="password" class="authLabel">Nouveau mot de passe</label>
                <input id="password" type="password" class="authInput @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="authItem">
                <label for="password-confirm" class="authLabel">Confirmer mot de passe</label>
                <input id="password-confirm" type="password" class="authInput" name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="authItem">
                <button type="submit" class="authButton">
                    Réintialiser le mot de passe
                </button>
            </div>
    </form>
</div>
@endsection
