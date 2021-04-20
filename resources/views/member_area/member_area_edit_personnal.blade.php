@extends('layouts.master')

@section('head-title')
    Atouts Services - Espace membre modification
@endsection

@section('head-meta-description')
    Modification des informations personelles d'Atouts Services
@endsection

@push('stylesheet')
    <link href="{{ asset('css/member_area.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="imageContainer">
        <h1>BIENVENUE DANS VOTRE ESPACE ATOUTS SERVICES A TOUS AGES</h1>
        <div class="memberContainer">
            <a href="{{ route('member-area') }}" class="memberBackButton">Retour</a>
            <h2>Votre profil</h2>
            <hr>
            <form class="memberForm" method="post" action="{{ route('member-area.update', $user->id) }}" enctype="multipart/form-data">

                @csrf
                @method('PATCH')

                <div class="memberItem">
                    <div class="memberInfo">Nom</div>
                    <input class="memberInput {{ $errors->has('name') ? 'error' : '' }}" type="text" name="name" id="name" value="{{old('name')?? $user->name}}">

                    @if ($errors->has('name'))
                        <div class="memberError">
                            Ce champ est obligatoire.
                        </div>
                    @endif
                </div>
                <hr>
                <div class="memberItem">
                    <div class="memberInfo">Adresse mail</div>
                    <input class="memberInput {{ $errors->has('email') ? 'error' : '' }}" type="text" name="email" id="email" value="{{old('email')?? $user->email}}">
                    @if ($errors->has('email'))
                        <div class="memberError">
                            Ce champ est obligatoire.
                        </div>
                    @endif
                </div>
                <div class="memberItem">
                    <input type="submit" name="update" value="Modifier" class="memberSubmitButton">
                </div>
            </form>    
        </div>
    </div>
@endsection