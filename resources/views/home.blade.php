@extends('layouts.master')

@section('head-title')
    Atouts Services - Accueil
@endsection

@section('head-meta-description')
    Page d'accueil d'atouts services
@endsection

@push('stylesheet')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div>
        Accueil
    </div>
@endsection