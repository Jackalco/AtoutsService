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
            <h1>Nom catégorie</h1>
        </header>
        <div class="listContainer">
            <h2>Prestataires proposés</h2>
            @if(count($providers) == 0)
                <div>Désolé, il semblerait que nous n'avons pas encore de prestataires pour le service que vous désirez.</div>
            @else
                @foreach($providers as $provider)
                    <div class="listItem">
                        <div class="listInfo">
                            <div class="listLogoCompany">
                                <img class="imageLogoCompany" src="{{asset('storage/imagesUploaded/'.$provider->image->path)}}" alt="Logo prestataire">
                            </div>
                            <div class="listTitle">
                                <h3>{{$provider->name}}</h3>
                                <hr>
                                <div class="listOwner">{{$provider->owner}}</div>
                            </div>
                            <div class="listCoordinates">
                                <div><i class="fas fa-home"></i>{{$provider->address}}, {{$provider->city}}</div>
                                <div><i class="fas fa-phone"></i>{{$provider->phone}}</div>
                                <div><i class="fas fa-at"></i>{{$provider->email}}</div>
                            </div>
                        </div>
                        <div class="listImage">
                            <img class="imageCompany" src="{{ asset('images/image4.jpg') }}" alt="Image entreprise">
                            <a class="listButton" href="">En savoir plus</a>
                        </div>
                    </div>
                @endforeach
            @endif
            
        </div>

    </div>
@endsection