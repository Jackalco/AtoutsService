@extends('layouts.master')

@section('head-title')
    Atouts Services - Espace membre
@endsection

@section('head-meta-description')
    Espace membre d'Atouts Services
@endsection

@push('stylesheet')
    <link href="{{ asset('css/member_area.css') }}" rel="stylesheet">
@endpush

@section('content')
    <h1>Espace membre</h1>
    <div class="memberContainer">
        <h2>Votre profil</h2>
        <hr>
        <div class="memberItem">
            <div class="memberInfo">Nom</div>
            <div class="memberFillInfo">{{$user->name}}</div>
        </div>
        <hr>
        <div class="memberItem">
            <div class="memberInfo">Adresse mail</div>
            <div class="memberFillInfo">{{$user->email}}</div>
        </div>
        <div class="memberItem">
            <a class="memberButton" href="{{ route('member-area.edit', $user->id) }}">Modifier les informations</a>
        </div>
        <div class="memberItem">
        <a class="memberButton" href="{{ route('member-area.providers.show', $user->id) }}">Voir vos prestataires</a>
        </div>
    </div>
@endsection