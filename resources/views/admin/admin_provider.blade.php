@extends('layouts.master')

@section('head-title')
    Atouts Services - Gestion des prestataires
@endsection

@section('head-meta-description')
    Page gestion des prestataires d'Atouts Services
@endsection

@push('stylesheet')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@endpush

@section('content')
<h1>Gestion des prestataires</h1>
    <h2>Liste des prestataires</h2>
    <div class="listContainer"> 
        <div class="listItem">
            <div class="listLogo">
                <img class="logo" src="" alt="Logo entreprise">
            </div>
            <div class="listInfo">
                <div><strong>Nom :</strong> </div>
                <div><strong>Adresse :</strong> </div>
                <div><strong>Ville :</strong> </div>
                <div><strong>Email :</strong> </div>
                <div><strong>Propriètaire :</strong> </div>
            </div>
            <div class="listAction">
                <form method="get" action="">
                    <button class="buttonAdmin">Modifier</button>
                </form>
                <form method="post">
                    <button class="buttonAdmin">Supprimer</button>
                </form>
            </div>
        </div>
        <div class="listItem">
            <div class="listLogo">
                <img src="" alt="Logo entreprise">
            </div>
            <div class="listInfo">
                <div>Nom :</div>
                <div>Adresse :</div>
                <div>Ville : </div>
            </div>
            <div class="listAction">
                <a href="">Modifier</a>
                <form action="post">
                    <button class="buttonAdmin">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
@endsection