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
        <div class="memberItem">
            <div class="memberInfo">Nom</div>
            <div class="memberInfo">{{$user->name}}</div>
        </div>
        <div class="memberItem">
            <div class="memberInfo">Adresse mail</div>
            <div class="memberInfo">{{$user->email}}</div>
        </div>
        <div class="memberItem">

        </div>
    </div>
@endsection