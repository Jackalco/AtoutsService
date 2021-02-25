@extends('layouts.master')

@section('head-title')
    Atouts Services - Accueil
@endsection

@section('head-meta-description')
    Page d'accueil d'Atouts Services
@endsection

@push('stylesheet')
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="authContainer">
    <h1>Connexion</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="authItem">
                <label for="email" class="authLabel">Adresse mail</label>
                <input id="email" type="email" class="authInput @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                     @error('email')
                        <span class="error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="authItem">
                <label for="password" class="authLabel">Mot de passe</label>
                <input id="password" type="password" class="authInput @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="error" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div>
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    Se souvenir de moi
                </label>
            </div>

            <div class="authItem">
                <button type="submit" class="authButton">
                    Connexion
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Mot de passe oublié ?
                    </a>
                @endif
            </div>
            <div class="authItem">
                <a class="authLink" href="{{ route('show.register') }}">S'inscrire</a>
            </div>
        </div>
    </form>
</div>
@endsection
