@extends('layouts.master')

@section('head-title')
    Atouts Services - Espace membre modification
@endsection

@section('head-meta-description')
    Modification des informations personelles d'Atouts Services
@endsection

@push('stylesheet')
    <link href="{{ asset('css/member_area.css') }}" rel="stylesheet">
@endpush

@section('content')
    <h1>Espace membre</h1>
    <div class="memberContainer">
        <h2>Vos prestataires</h2>
        <hr>
        @if(isset($providers))
            <div>Nope</div>
        @else
            <div>{{$providers}}</div>
        @endif
    </div>
@endsection