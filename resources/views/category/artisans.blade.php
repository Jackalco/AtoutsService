@extends('layouts.master')

@section('head-title')
    Atouts Services - Artisans
@endsection

@section('head-meta-description')
    Page des artisans d'Atouts Services
@endsection

@push('stylesheet')
    <link href="{{ asset('css/category.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="artisanContainer">
        <header>
            <div class="icon artisan"><i class="fas fa-tools"></i></i></div>
            <h1>Artisans</h1>
        </header>
        <div class="listContainer">
            <h2>Choisissez le service qui vous intéresse</h2>
            <div class="categoryContainer">
            @foreach($categories as $category)
                <div class="categoryItem" style="background-image : url({{asset('storage/imagesUploaded/'.$category->image->path)}})">
                    <a class="categoryLink" href="{{ route('list', $category->id) }}"><strong>{{$category->name}}</strong></a>
                </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection