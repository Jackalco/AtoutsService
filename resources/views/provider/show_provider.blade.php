@extends('layouts.master')

@section('head-title')
    Atouts Services - {{$provider->name}}
@endsection

@section('head-meta-description')
    Informations sur {{$provider->name}}.
@endsection

@push('stylesheet')
    <link href="{{ asset('css/provider.css') }}" rel="stylesheet">
@endpush

@section('content')
    <header><h1>{{$provider->name}}</h1> <img class="providerLogo" src="{{ asset('storage/imagesUploaded/'.$provider->image->path) }}" alt="Logo de {{$provider->name}}"></header>
    <div class="providerContainer">
        <h2>Informations utiles</h2>
        <div class="providerContainerInfo">
            <div class="providerItem">
                <div class="providerIcon"><i class="fas fa-phone" style="color: {{$provider->color}}"></i></div>
                <div class="providerInfo">
                    <div class="providerFillInfo">Téléphone</div>
                    <div>{{$provider->phone}}</div>
                </div>
            </div>
            <div class="providerItem">
                <div class="providerIcon"><i class="fas fa-at" style="color: {{$provider->color}}"></i></div>
                <div class="providerInfo">
                    <div class="providerFillInfo">Adresse mail</div>
                    <div>{{$provider->email}}</div>
                </div>
            </div>
            <div class="providerItem">
                <div class="providerIcon"><i class="fas fa-home" style="color: {{$provider->color}}"></i></div>
                <div class="providerInfo">
                    <div class="providerFillInfo">Adresse</div>
                    <div>{{$provider->address}}, {{$provider->city}}</div>
                </div>
            </div>
            <div class="providerItem">
                <div class="providerIcon"><i class="fas fa-list" style="color: {{$provider->color}}"></i></div>
                <div class="providerInfo">
                    <div class="providerFillInfo">Secteur</div>
                    <div>{{$provider->activity}}</div>
                </div>
            </div>
            <div class="providerItem">
                <div class="providerIcon"><i class="fas fa-user-alt" style="color: {{$provider->color}}"></i></div>
                <div class="providerInfo">
                    <div class="providerFillInfo">Propriétaire</div>
                    <div>{{$provider->owner}}</div>
                </div>
            </div>
        </div>      
    </div>
    <div class="providerContainer">
        <h2>Présentation</h2>
        @if($provider->description == null)
        <p>Le prestataire n'a pas encore mis de description.</p>
        @else
        <p>{{$provider->description}}</p>
        @endif
    </div>
    <div class="providerContainer">
        <h2>Note</h2>
        @if($average == null)
            <p>Ce prestataire n'a pas encore reçu de note. Soyez le premier l'évaluer !</p>
        @else
            <div>Ce prestataire a actuellement une note de <strong>{{$average}} / 5</strong>.</div>
        @endif
        @if(!App\Models\User::auth())
            <p>Vous devez être connecté pour pouvoir évaluer ce prestataire.</p>
        @elseif(App\Models\User::auth())
            <form method="post" action="{{ route('provider.evaluate', [$provider->id, $user->id]) }}">
                @csrf
                <div class="rateItem">
                    <input type="radio" id="one" name="score" value="1">
                    <label for="one"><i class="fas fa-star starIcon"></i><i class="far fa-star starIcon"></i><i class="far fa-star starIcon"></i><i class="far fa-star starIcon"></i><i class="far fa-star starIcon"></i></label>
                </div>
                <div class="rateItem">
                    <input type="radio" id="two" name="score" value="2">
                    <label for="two"><i class="fas fa-star starIcon"></i><i class="fas fa-star starIcon"></i><i class="far fa-star starIcon"></i><i class="far fa-star starIcon"></i><i class="far fa-star starIcon"></i></label>
                </div>
                <div class="rateItem">
                    <input type="radio" id="three" name="score" value="3">
                    <label for="three"><i class="fas fa-star starIcon"></i><i class="fas fa-star starIcon"></i><i class="fas fa-star starIcon"></i><i class="far fa-star starIcon"></i><i class="far fa-star starIcon"></i></label>
                </div>
                <div class="rateItem">
                    <input type="radio" id="four" name="score" value="4">
                    <label for="four"><i class="fas fa-star starIcon"></i><i class="fas fa-star starIcon"></i><i class="fas fa-star starIcon"></i><i class="fas fa-star starIcon"></i><i class="far fa-star starIcon"></i></label>
                </div>
                <div class="rateItem">
                    <input type="radio" id="five" name="score" value="5">
                    <label for="five"><i class="fas fa-star starIcon"></i><i class="fas fa-star starIcon"></i><i class="fas fa-star starIcon"></i><i class="fas fa-star starIcon"></i><i class="fas fa-star starIcon"></i></label>
                </div>
                @if ($errors->has('score'))
                <div class="error">
                    Vous n'avez pas choisi une note.
                </div>
                @endif
                <button class="rateButton" type="submit">Notez</button>
                @if(Session::has('success'))
                    <div class="alert">
                        {{Session::get('success')}}
                    </div>
                @endif
            </form>
        @endif
    </div>
@endsection