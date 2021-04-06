@extends('layouts.master')

@section('head-title')
    Atouts Services - Services
@endsection

@section('head-meta-description')
    Page des services d'Atouts Services
@endsection

@push('stylesheet')
    <link href="{{ asset('css/list.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container" style="background-image : url({{asset('storage/imagesUploaded/'.$category->image->path)}})">
        <header>
            <h1>{{$category->name}}</h1>
        </header>
        <div class="listContainer">
            <h2>Prestataires proposés</h2>
            @if(count($providersOrganized) == 0)
                <div class="noProviders">Désolé, il semblerait que nous n'avons pas encore de prestataires pour le service que vous désirez.</div>
            @else
                @foreach($providersOrganized as $provider)
                    <div class="listItem">
                        <div class="listInfo">
                            <div class="listLogoCompany">
                                <img class="imageLogoCompany" src="{{asset('storage/imagesUploaded/'.$provider->image->path)}}" alt="Logo prestataire" style="border-color : {{$provider->color}}">
                            </div>
                            <div class="listTitle" style="color : {{$provider->color}}">
                                <h3>{{$provider->name}}</h3>
                                <hr style="background-color : {{$provider->color}}">
                                <div class="listOwner">{{$provider->owner}}</div>
                            </div>
                            <div class="listCoordinates" style="background-color : {{$provider->color}}">
                                <div><i class="fas fa-home"></i>{{$provider->address}}, {{$provider->city}}</div>
                                <div><i class="fas fa-phone"></i>{{$provider->phone}}</div>
                                <div><i class="fas fa-at"></i>{{$provider->email}}</div>
                            </div>
                        </div>
                        <div class="listButtonItem">
                            <a class="listButton" href="{{ route('provider.show', $provider->id) }}">En savoir plus</a>
                        </div>
                    </div>
                @endforeach
            @endif
            
        </div>

    </div>
@endsection