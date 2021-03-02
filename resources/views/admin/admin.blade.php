@extends('layouts.master')

@section('head-title')
    Atouts Services - Administrateur
@endsection

@section('head-meta-description')
    Page administrateur d'Atouts Services
@endsection

@push('stylesheet')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@endpush

@section('content')
    <h1>Panneau administrateur</h1>
    <div class="adminContainer">
        <a class="adminItem" href="{{ route('admin.category') }}">Gérer les catégories</a>
        <a class="adminItem" href="{{ route('admin.provider') }}">Gérer les prestataires</a>
        <a class="adminItem" href="{{ route('admin.user') }}">Gérer les utilisateurs</a>
    </div>
@endsection