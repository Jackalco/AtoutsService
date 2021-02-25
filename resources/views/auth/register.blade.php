@extends('layouts.master')

@section('head-title')
    Atouts Services - Inscription
@endsection

@section('head-meta-description')
    Page d'inscription d'Atouts Services
@endsection

@push('stylesheet')
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="authContainer">
    <h1>Inscription</h1>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="authItem">
            <label for="name" class="authLabel">Nom</label>
            <input id="name" type="text" class="authInput @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
               
                @error('name')
                    <span class="error" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="authItem">
            <label for="email" class="authLabel">Adresse mail</label>
            <input id="email" type="email" class="authInput @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="authItem">
            <label for="password" class="authLabel">Mot de passe</label>
            <input id="password" type="password" class="authInput @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="error" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="authItem">
            <label for="password-confirm" class="authLabel">Confirmer mot de passe</label>
            <input id="password-confirm" type="password" class="authInput" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div class="authItem">
            <button type="submit" class="authButton">S'inscrire</button>
        </div>
    </form>
</div>
@endsection
