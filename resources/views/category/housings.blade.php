@extends('layouts.master')

@section('head-title')
    Atouts Services - Logements
@endsection

@section('head-meta-description')
    Page des logements d'Atouts Services
@endsection

@push('stylesheet')
    <link href="{{ asset('css/category.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="housingContainer">
        <header>
            <div class="icon housing"><i class="fas fa-home"></i></div>
            <h1>Logements</h1>
        </header>
        <div class="listContainer">
            <h2>Choisissez le service qui vous intéresse</h2>
            <div class="categoryContainer">
                <div class="categoryItem"><a class="categoryLink" href=""><strong>Grande maison</strong></a></div>
                <div class="categoryItem"><a class="categoryLink" href=""><strong>Petite maison</strong></a></div>
                <div class="categoryItem"><a class="categoryLink" href=""><strong>Cabanon</strong></a></div>
                <div class="categoryItem"><a class="categoryLink" href=""><strong>Moyenne maison</strong></a></div>
                <div class="categoryItem"><a class="categoryLink" href=""><strong>Appartement hors de prix</strong></a></div>
            </div>
        </div>
    </div>
@endsection