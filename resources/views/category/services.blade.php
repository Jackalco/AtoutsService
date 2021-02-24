@extends('layouts.master')

@section('head-title')
    Atouts Services - Services
@endsection

@section('head-meta-description')
    Page des services d'Atouts Services
@endsection

@push('stylesheet')
    <link href="{{ asset('css/category.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="serviceContainer">
        <header>
            <div class="icon service"><i class="fas fa-broom"></i></div>
            <h1>Services</h1>
        </header>
        <div class="listContainer">
            <h2>Choisissez le service qui vous intéresse</h2>
            <div class="categoryContainer">
                <div class="categoryItem"><a class="categoryLink" href=""><strong>Infirmière</strong></a></div>
                <div class="categoryItem"><a class="categoryLink" href=""><strong>Infirmière</strong></a></div>
                <div class="categoryItem"><a class="categoryLink" href=""><strong>Infirmière</strong></a></div>
                <div class="categoryItem"><a class="categoryLink" href=""><strong>Infirmière</strong></a></div>
                <div class="categoryItem"><a class="categoryLink" href=""><strong>Infirmière</strong></a></div>
                <div class="categoryItem"><a class="categoryLink" href=""><strong>Infirmière</strong></a></div>
                <div class="categoryItem"><a class="categoryLink" href=""><strong>Infirmière</strong></a></div>
                <div class="categoryItem"><a class="categoryLink" href=""><strong>Infirmière</strong></a></div>
            </div>
        </div>
    </div>
@endsection