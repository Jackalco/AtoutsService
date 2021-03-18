@extends('layouts.master')

@section('head-title')
    Atouts Services - Mot de passe oublié
@endsection

@section('head-meta-description')
    Page de mot de passe oublié d'Atouts Services
@endsection

@push('stylesheet')
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@endpush

@section('content')

<div class="authContainer">
        <h1>Mot de passe oublié</h1>
            @if (session('status'))
                <div class="success" role="alert">
                    L'email de réinitialisation du mot de passe a bien été envoyé !
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="authItem">
                    <label for="email" class="authLabel">Adresse mail</label>
                    <input id="email" type="email" class="authInput @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="error" role="alert">
                            <strong>L'adresse mail est incorrect.</strong>
                        </span>
                    @enderror

                </div>

                <div class="authItem">
                    <button type="submit" class="authButton">
                        Envoyer lien de réinitialisation
                    </button>
                </div>
            </form>

    </div>
</div>
@endsection
