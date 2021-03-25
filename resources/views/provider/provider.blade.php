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
    <div class="introContainer">
        <div class="introItem">
            Devenez prestataires de <br>
            Atous Services <br>
            A tous âges
        </div>
        <div class="introItem">
            <div class="introPanel">
                @if(!App\Models\User::auth())
                    <div>
                        <a class="introButton register" href="{{ route('show.register') }}">S'incrire</a>
                    </div>
                    <div><strong>OU</strong></div>
                    <div>Déjà inscrit ? <br><br>
                        <a class="introButton login" href="{{ route('show.login') }}">Se connecter</a>
                    </div>
                @endif
                @if(App\Models\User::auth())
                    <div>
                        <p>Vous êtes déjà connectez ! Vous trouverez le lien vers le formulaire plus bas !</p>
                        <i class="fas fa-arrow-circle-down logoPanel"></i>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <h3>Devenez prestataires, trouvez de nouveaux clients</h3>
    <div class="howContainer">
        <h2>COMMENT ÇA MARCHE ?</h2>
        <div class="howInfo">
            <i class="far fa-clipboard howLogo"></i>
            <div class="howText">Remplissez le formulaire et envoyez-le-nous !</div>
            <i class="fas fa-universal-access howLogo color"></i>
            <div class="howText">Travaillez sereinement et en toute sécurité !</div>
        </div>
        <a class="howButton" href="{{ route('form-provider.show') }}">Remplir le formulaire</a>

    </div>
@endsection