@extends('layouts.master')

@section('head-title')
    Atouts Services - Accueil
@endsection

@section('head-meta-description')
    Page d'accueil d'Atouts Services
@endsection

@push('stylesheet')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endpush

@section('content')
    <section class="needContainer">
        <div class="needItem">Des artisans et des services de proximité pour vous aider</div>
        <div class="needItem">
            <a href="#">De quel service avez-vous besoin ?</a>
        </div>
        <div class="needItem"></div>
    </section>
    <section class="serviceContainer">
        <a class="serviceLayer" href="{{ route('services') }}">
            Services
        </a>
    </section>
    <section class="cardContainer">
        <div class="cardItem"><a class="cardLayer" href="">Artisans</a></div>
        <div class="cardItem"><a class="cardLayer" href="">Logement</a></div>
    </section>
    <section class="howContainer">
        <h2>Comment ça marche ?</h2>
        <ol>
            <li><span class="circle"><i class="fas fa-comment"></i></span> Décrivez votre besoin et postez</li>
            <li><span class="circle"><i class="fas fa-hard-hat"></i></span>Les prestataires disponibles et compétents vous proposent leurs services</li>
            <li><span class="circle"><i class="fas fa-hands-helping"></i></span>Évaluez et réglez votre prestataire une fois le travail terminé</li>
        </ol>
    </section>
    <section class="discoverContainer">
        <h2>Découvrez nos services</h2>
        <div class="iconContainer">
            <div class="iconItem">
                <i class="fas fa-tools"></i>
                <i class="fas fa-broom"></i>
                <i class="fas fa-tree"></i>
            </div>
            <div class="iconItem">
                <i class="fas fa-wrench"></i>
                <i class="fas fa-blind"></i>
                <i class="fas fa-paw"></i>
            </div>
            <div class="iconItem">
                <i class="fas fa-user-graduate"></i>
                <i class="fas fa-desktop"></i>
                <i class="fas fa-tasks"></i>
            </div>
            <div class="iconItem">
                <i class="fas fa-truck"></i>
                <i class="fas fa-truck-loading"></i>
                <i class="fas fa-handshake"></i>
            </div>
        </div>
        <p>Atout Services et à tous âges est une association qui oeuvre pour la préservation des petites entreprises, valorisant les entreprises de proximité.</p>
        <p>Nos missions sont :</p>
        <ul>
            <li>Protéger les petites entreprises de service à la personne</li>
            <li>Développer l'attractivité, créer des emplois</li>
            <li>Protéger les béneficiaires en leur proposant des prestations de qualité</li>
        </ul>
    </section>
@endsection