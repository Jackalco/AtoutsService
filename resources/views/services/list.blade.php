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
    <div class="container">
        <header>
            <h1>Nom catégorie</h1>
        </header>
        <div class="listContainer">
            <h2>Prestataires proposés</h2>
            <div class="listItem">
                <div class="listInfo">
                    <div class="listTitle">
                        <h3>Cabinet Infirmier des Pins Saint-Brévin</h3>
                        <hr>
                        <div class="listOwner">Propriètaire</div>
                    </div>
                    <div class="listLogoCompany">
                        <img class="imageLogoCompany" src="{{ asset('images/logo.png') }}" alt="Logo prestataire">
                    </div>
                    <div class="listCoordinates">
                        <div><i class="fas fa-home"></i>13 rue de Pornic, 44250, Saint-Brévin-Les-Pins</div>
                        <div><i class="fas fa-phone"></i>Téléphone</div>
                        <div><i class="fas fa-at"></i>Adresse mail</div>
                    </div>
                </div>
                <div class="listImage">
                    <img class="imageCompany" src="{{ asset('images/image4.jpg') }}" alt="Image entreprise">
                </div>
            </div>
            <div class="listItem">
                <div class="listInfo">
                    <div class="listTitle">
                        <h3>Cabinet Infirmier des Pins Saint-Brévin</h3>
                        <hr>
                        <div class="listOwner">Propriètaire</div>
                    </div>
                    <div class="listLogoCompany">
                        <img class="imageLogoCompany" src="{{ asset('images/logo.png') }}" alt="Logo prestataire">
                    </div>
                    <div class="listCoordinates">
                        <div><i class="fas fa-home"></i>Adresse</div>
                        <div><i class="fas fa-phone"></i>Téléphone</div>
                        <div><i class="fas fa-at"></i>Adresse mail</div>
                    </div>
                </div>
                <div class="listImage">
                    <img class="imageCompany" src="{{ asset('images/image4.jpg') }}" alt="Image entreprise">
                </div>
            </div>
            <div class="listItem">
                <div class="listInfo">
                    <div class="listTitle">
                        <h3>Cabinet Infirmier des Pins Saint-Brévin</h3>
                        <hr>
                        <div class="listOwner">Propriètaire</div>
                    </div>
                    <div class="listLogoCompany">
                        <img class="imageLogoCompany" src="{{ asset('images/logo.png') }}" alt="Logo prestataire">
                    </div>
                    <div class="listCoordinates">
                        <div><i class="fas fa-home"></i>Adresse</div>
                        <div><i class="fas fa-phone"></i>Téléphone</div>
                        <div><i class="fas fa-at"></i>Adresse mail</div>
                    </div>
                </div>
                <div class="listImage">
                    <img class="imageCompany" src="{{ asset('images/image4.jpg') }}" alt="Image entreprise">
                </div>
            </div>
        </div>

    </div>
@endsection