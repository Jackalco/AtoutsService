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
                <div>
                    <a class="introButton register" href="{{ route('show.register') }}">S'incrire</a>
                </div>
                <div><strong>OU</strong></div>
                <div>Déjà inscrit ? <br><br>
                    <a class="introButton login" href="{{ route('show.login') }}">Se connecter</a>
                </div> 
            </div>
        </div>
    </div>
    <h3>Devenez prestataires, trouvez de nouveaux clients</h3>
    <div class="howContainer">
        <h2>COMMENT ÇA MARCHE ?</h2>
        <div class="howInfo">
            <i class="far fa-clipboard howLogo"></i>
            <div>Remplissez le formulaire et envoyez-le-nous !</div>
            <i class="fas fa-universal-access howLogo"></i>
            <div>Travaillez serainement et en toute sécurité !</div>
        </div>
        <a class="howButton" href="">Remplir le formulaire</a>

    </div>
@endsection