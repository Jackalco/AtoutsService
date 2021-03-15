@extends('layouts.master')

@section('head-title')
    Atouts Services - Espace membre pour les prestataires
@endsection

@section('head-meta-description')
    Modification d'un prestataire d'Atouts Services par l'utilisateur propriétaire 
@endsection

@push('stylesheet')
    <link href="{{ asset('css/member_area.css') }}" rel="stylesheet">
@endpush

@section('content')
    @if(Session::has('error'))
        <div class="error">
            {{Session::get('error')}}
        </div>
    @else
        <h1>Modification des informations de votre entreprise</h1>
        <div class="memberContainer">
            <a href="{{ route('member-area.providers.show', $user->id) }}" class="memberBackButton">Retour</a>
            <form class="formContainer"  method="post" action="{{ route('member-area.provider.update', [$user->id, $provider->id]) }}">
                @csrf
                @method('PATCH')

                <div class="formItem">
                    <label class="formLabel">Nom de l'entreprise</label>
                    <input type="text" class="formInput {{ $errors->has('name') ? 'error' : '' }}" name="name" id="name" value="{{old('name')?? $provider->name}}">
                    @if($errors->has('name'))
                        <div class="error">
                            Ce champ est obligatoire.
                        </div>
                    @endif
                </div>

                <div class="formItem">
                    <label class="formLabel">Adresse</label>
                    <input type="text" class="formInput {{ $errors->has('address') ? 'error' : '' }}" name="address" id="address" value="{{old('address')?? $provider->address}}">
                    @if($errors->has('address'))
                        <div class="error">
                            Ce champ est obligatoire.
                        </div>
                    @endif
                </div>

                <div class="formItem">
                    <label class="formLabel">Ville</label>
                    <input type="text" class="formInput {{ $errors->has('city') ? 'error' : '' }}" name="city" id="city" value="{{old('city')?? $provider->city}}">
                    @if($errors->has('city'))
                        <div class="error">
                            Ce champ est obligatoire.
                        </div>
                    @endif
                </div>

                <div class="formItem">
                    <label class="formLabel">Téléphone</label>
                    <input type="tel" class="formInput {{ $errors->has('phone') ? 'error' : '' }}" name="phone" id="phone" value="{{old('phone')?? $provider->phone}}">
                    @if($errors->has('phone'))
                        <div class="error">
                            Ce champ est obligatoire.
                        </div>
                    @endif
                </div>            

                <div class="formItem">
                    <label class="formLabel">Adresse mail</label>
                    <input type="text" class="formInput {{ $errors->has('email') ? 'error' : '' }}" name="email" id="email" value="{{old('email')?? $provider->email}}">
                    @if($errors->has('email'))
                        <div class="error">
                            Ce champ est obligatoire.
                        </div>
                    @endif
                </div>

                <div class="formItem">
                    <label class="formLabel">Nom du propriétaire de l'entreprise</label>
                    <input type="text" class="formInput {{ $errors->has('owner') ? 'error' : '' }}" name="owner" id="owner" value="{{old('owner')?? $provider->owner}}">
                    @if($errors->has('owner'))
                        <div class="error">
                            Ce champ est obligatoire.
                        </div>
                    @endif
                </div>

                <div class="formItem">
                    <label class="formLabel">Nombre de structure</label>
                    <input type="text" class="formInput {{ $errors->has('structure') ? 'error' : '' }}" name="structure" id="structure" value="{{old('structure')?? $provider->structure}}">
                    @if($errors->has('structure'))
                        <div class="error">
                            Ce champ est obligatoire.
                        </div>
                    @endif
                </div>

                <div class="formItem">
                    <label class="formLabel">Effectif</label>
                    <input type="text" class="formInput {{ $errors->has('workforce') ? 'error' : '' }}" name="workforce" id="workforce" value="{{old('workforce')?? $provider->workforce}}">
                    @if($errors->has('workforce'))
                        <div class="error">
                            Ce champ est obligatoire.
                        </div>
                    @endif
                </div>

                <div class="formItem">
                    <label class="formLabel">Numéro de SIRET</label>
                    <input type="text" class="formInput {{ $errors->has('siret') ? 'error' : '' }}" name="siret" id="siret" value="{{old('siret')?? $provider->siret}}">
                    @if($errors->has('siret'))
                        <div class="error">
                            Ce champ est obligatoire.
                        </div>
                    @endif
                </div>               

                <div class="formItem">
                    <label class="formLabel">Activité de l'entreprise</label>
                    <select class="formInput {{ $errors->has('activity') ? 'error' : '' }}" type="text" name="activity" id="activity">
                        <option value="">Choississez une activité</option>
                        @foreach($categories as $category)
                            <option value="{{$category->name}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('activity'))
                        <div class="error">
                            Ce champ est obligatoire.
                        </div>
                    @endif
                </div>               

                <div class="formItem">
                    <label class="formLabel">Description de l'entreprise (optionnel)</label>
                    <textarea class="formInput {{ $errors->has('description') ? 'error' : '' }}" name="description" id="description"></textarea>
                </div>          

                <div class="formItem">
                    <label class="formLabel">Choississez le thème pour votre entreprise (optionnel)</label>
                    <input type="color" class="formInput {{ $errors->has('color') ? 'error' : '' }}" name="color" id="color" value="{{old('color')?? $provider->color}}">
                </div>

                <div class="formItem">
                    <label class="formLabel">Logo de l'entreprise (optionnel)</label>
                    <input type="file" accept=".png, .jpg" class="formInput {{ $errors->has('image') ? 'error' : '' }}" name="image" id="image">
                </div>

                <div class="formItem">
                    <button type="submit" class="formButton">Modifier</button>
                </div>

            </form>
        </div>
    @endif
@endsection