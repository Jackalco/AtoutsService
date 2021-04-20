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
<h2>Ajout d'un prestataire</h2>
<div class="formContainer">
        <form enctype="multipart/form-data" method="post" action="{{ route('admin.provider.store') }}">
        @csrf
            @if(Session::has('successStore'))
                <div class="alert">
                    {{Session::get('successStore')}}
                </div>
            @endif
            <div class="formItem">
                <div class="formLabel">Nom de l'entreprise</div>
                <input class="formInput {{ $errors->has('name') ? 'error' : '' }}" type="text" name="name" id="name">

                @if ($errors->has('name'))
                <div class="error">
                    Ce champ est obligatoire.
                </div>
                @endif
            </div>
            <div class="formItem">
                <div class="formLabel">Adresse</div>
                <input class="formInput {{ $errors->has('address') ? 'error' : '' }}" type="text" name="address" id="address">

                @if ($errors->has('address'))
                <div class="error">
                    Ce champ est obligatoire.
                </div>
                @endif
            </div>
            <div class="formItem">
                <div class="formLabel">Ville</div>
                <input class="formInput {{ $errors->has('city') ? 'error' : '' }}" type="text" name="city" id="city">

                @if ($errors->has('city'))
                <div class="error">
                    Ce champ est obligatoire.
                </div>
                @endif
            </div>
            <div class="formItem">
                <div class="formLabel">Téléphone</div>
                <input class="formInput {{ $errors->has('phone') ? 'error' : '' }}" type="text" name="phone" id="phone">

                @if ($errors->has('phone'))
                <div class="error">
                    Ce champ est obligatoire.
                </div>
                @endif
            </div>
            <div class="formItem">
                <div class="formLabel">Adresse mail</div>
                <input class="formInput {{ $errors->has('email') ? 'error' : '' }}" type="text" name="email" id="email">

                @if ($errors->has('email'))
                <div class="error">
                    Ce champ est obligatoire.
                </div>
                @endif
            </div>
            <div class="formItem">
                <div class="formLabel">Date de création de l'entreprise</div>
                <input class="formInput {{ $errors->has('date') ? 'error' : '' }}" type="month" name="date" id="date">

                @if ($errors->has('date'))
                <div class="error">
                    Ce champ est obligatoire.
                </div>
                @endif
            </div>
            <div class="formItem">
                <div class="formLabel">Numéro de SIRET</div>
                <input class="formInput {{ $errors->has('siret') ? 'error' : '' }}" type="text" name="siret" id="siret">

                @if ($errors->has('siret'))
                <div class="error">
                    Ce champ est obligatoire.
                </div>
                @endif
            </div>
            <div class="formItem">
                <div class="formLabel">Secteur d'activité</div>
                <select class="formInput {{ $errors->has('activity') ? 'error' : '' }}" name="activity" id="activity">
                    <option value="">Choississez un secteur</option>                         
                    @foreach($categories as $category)
                        <option value="{{$category->name}}">{{$category->name}}</option>
                    @endforeach
                </select>

                @if ($errors->has('activity'))
                <div class="error">
                    Ce champ est obligatoire.
                </div>
                @endif
            </div>
            <div class="formItem">
                <div class="formLabel">Effectif</div>
                <input class="formInput {{ $errors->has('workforce') ? 'error' : '' }}" type="text" name="workforce" id="workforce">

                @if ($errors->has('workforce'))
                <div class="error">
                    Ce champ est obligatoire.
                </div>
                @endif
            </div>
            <div class="formItem">
                <div class="formLabel">Nombre de structure</div>
                <input class="formInput {{ $errors->has('structure') ? 'error' : '' }}" type="text" name="structure" id="structure">

                @if ($errors->has('structure'))
                <div class="error">
                    Ce champ est obligatoire.
                </div>
                @endif
            </div>
            <div class="formItem">
                <div class="formLabel">Propriétaire</div>
                <select class="formInput {{ $errors->has('owner') ? 'error' : '' }}" name="owner" id="owner">
                    <option value="">Choississez un propriétaire</option>                         
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>

                @if ($errors->has('owner'))
                <div class="error">
                    Ce champ est obligatoire.
                </div>
                @endif
            </div>

            <div class="formItem">
                <div class="formLabel">Logo de l'entreprise</div>
                <input type="file" accept=".png, .jpg" class="formInput {{ $errors->has('image') ? 'error' : '' }}" name="image" id="image">

                @if ($errors->has('image'))
                <div class="error">
                    Ce champ est obligatoire.
                </div>
                @endif
            </div>

            <input type="submit" name="send" value="Ajouter" class="buttonAdmin">
        </form>
    </div>
    <h2>Liste des prestataires</h2>
    <div class="listContainer">
    @if(Session::has('successDelete'))
        <div class="alert">
            {{Session::get('successDelete')}}
        </div>
    @endif
    @if(count($providers) == 0)
    <div>Il n'y a, actuellement, aucune sous-catégorie.</div>  
    @else
        @foreach($providers as $provider)
            <div class="listItem">
                <div class="listLogo">
                    <img class="logo" src="{{ asset('storage/imagesUploaded/'.$provider->image->path) }}" alt="Logo de {{$provider->name}}">
                </div>
                <div class="listInfo">
                    <div><strong>Nom :</strong> {{$provider->name}}</div>
                    <div><strong>Adresse :</strong> {{$provider->address}}</div>
                    <div><strong>Ville :</strong> {{$provider->city}}</div>
                    <div><strong>Email :</strong> {{$provider->email}}</div>
                    <div><strong>Propriètaire :</strong> {{$provider->owner}}</div>
                    @if($provider->end_date > $today)
                        <div><strong>Fin de l'abonnement :</strong> {{$provider->end_date}}</div>
                    @endif
                </div>
                <div class="listAction">
                    <form method="post" action="{{ route('admin.provider.delete', $provider->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="buttonAdmin">Supprimer</button>
                    </form>
                    @if($provider->end_date < $today || $provider->end_date == null)
                        <form method="post" action="{{ route('admin.provider.subscription', $provider->id) }}">
                            @csrf
                            @method('PATCH')
                            <button class="buttonAdmin">Ajouter un an d'abonnement</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    @endif
    </div>
@endsection