@extends('layouts.master')

@section('head-title')
    Atouts Services - Gestion sous-catégories
@endsection

@section('head-meta-description')
    Gestion des sous-catégories d'Atouts Services
@endsection

@push('stylesheet')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@endpush

@section('content')
    <h1>Gestion des sous-catégories</h1>
    <h2>Ajout d'une sous-catégorie</h2>
    <div class="formContainer">
        <form enctype="multipart/form-data" method="post" action="{{ route('admin.category.store') }}">

        @csrf

            <div class="formItem">
                <div class="formLabel">Nom</div>
                <input class="formInput {{ $errors->has('name') ? 'error' : '' }}" type="text" name="name" id="name">

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



            <input type="submit" name="send" value="Ajouter" class="buttonAdmin">

            @if(Session::has('success'))
                <div class="alert">
                    {{Session::get('success')}}
                </div>
            @endif

        </form>
    </div>
    <h2>Liste des sous-catégories</h2>
    <div class="listContainer">      
    @foreach($categories as $category)
            <div class="listItem">
                <div class="listLogo">
                    <img class="logoCompany" src="{{ asset('storage/imagesUploaded/'.$category->path) }}" alt="Logo catégorie">
                </div>
                <div class="listInfo">
                    <div><strong>Nom :</strong> {{$category->name}}</div>
                    <div><strong>Catégorie :</strong> {{$category->category}}</div>
                </div>
                <div class="listAction">
                    <form method="get" action="{{ route('admin.category.edit', $category->id) }}">
                        <button class="buttonAdmin">Modifier</button>
                    </form>
                    <form method="post" action="{{ route('admin.category.delete', $category->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="buttonAdmin">Supprimer</button>
                    </form>
                </div>
            </div>
        @endforeach
        
    </div>
@endsection