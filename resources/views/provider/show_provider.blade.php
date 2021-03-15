@extends('layouts.master')

@section('head-title')
    Atouts Services - {{$provider->name}}
@endsection

@section('head-meta-description')
    Informations sur {{$provider->name}}.
@endsection

@push('stylesheet')
    <link href="{{ asset('css/list.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="providerContainer">
        <div class="providerItem"></div>
    
    </div>
@endsection