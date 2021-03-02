@extends('layouts.master')

@section('head-title')
    Atouts Services - Modification sous-catégories
@endsection

@section('head-meta-description')
    Modification d'une sous-catégories d'Atouts Services
@endsection

@push('stylesheet')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@endpush

@section('content')
    <h1>Modification d'une sous-catégorie</h1>
    <div class="formContainer">
        <form enctype="multipart/form-data" method="post" action="">
        @csrf
        @method('PATCH')

        <div class="formItem">
            <div class="formLabel">Nom</div>
            <input class="formInput {{ $errors->has('name') ? 'error' : '' }}" type="text" name="name" id="name" value="{{old('name')?? $category->name}}">

                @if ($errors->has('name'))
                    <div class="error">
                        Ce champ est obligatoire.
                    </div>
                @endif
        </div>

        <div class="formItem">
            <div class="formLabel">Catégorie</div>
            <select class="formInput {{ $errors->has('category') ? 'error' : '' }}" name="category" id="category">
                <option value="">Choississez une catégorie</option>                         
                <option value="Service">Service</option>
                <option value="Artisan">Artisan</option>
                <option value="Logement">Logement</option>
            </select>

            @if ($errors->has('category'))
                <div class="error">
                    Ce champ est obligatoire.
                </div>
            @endif
        </div>

        <div class="formItem">
            <div class="formLabel">Image</div>
            <input type="file" accept=".png, .jpg" class="formInput {{ $errors->has('image') ? 'error' : '' }}" name="image" id="image">

            @if ($errors->has('image'))
                <div class="error">
                    Ce champ est obligatoire.
                </div>
            @endif
        </div>


    </div>
@endsection