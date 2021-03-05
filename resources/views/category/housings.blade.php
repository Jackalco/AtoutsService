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
            @foreach($categories as $category)
                <div class="categoryItem" style="background-image : url({{asset('storage/imagesUploaded/'.$category->path)}})"><a class="categoryLink" href="" =><strong>{{$category->name}}</strong></a></div>
            @endforeach
            </div>
        </div>
    </div>
@endsection