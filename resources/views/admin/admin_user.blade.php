@extends('layouts.master')

@section('head-title')
    Atouts Services - Gestion des utilisateurs
@endsection

@section('head-meta-description')
    Page gestion des utilisateurs d'Atouts Services
@endsection

@push('stylesheet')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@endpush

@section('content')
    <h1>Gestion des utilisateurs</h1>
    <h2>Liste des utilisateurs</h2>
    <div class="listContainer"> 
        <div class="listItem">
            <div class="listInfo">
                <div><strong>Nom :</strong> </div>
                <div><strong>Email :</strong> </div>
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
            <div class="listInfo">
                <div><strong>Nom :</strong> </div>
                <div><strong>Email :</strong> </div>
            </div>
            <div class="listAction">
                <form method="get" action="">
                    <button class="buttonAdmin">Modifier</button>
                </form>
                <form action="post">
                    <button class="buttonAdmin">Supprimer</button>
                </form>
            </div>
        </div>
    </div>
@endsection