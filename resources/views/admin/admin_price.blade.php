@extends('layouts.master')

@section('head-title')
    Atouts Services - Gestion sous-catégories
@endsection

@section('head-meta-description')
    Gestion des sous-catégories d'Atouts Services
@endsection

@push('stylesheet')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@endpush

@section('content')
    <h1>Gestion des prix</h1>
    <section>
        <div class="formContainer">
            @if(Session::has('success'))
                <div class="alert">
                    {{Session::get('success')}}
                </div>
            @endif
            <form class="formItem" method="post" action="{{ route('admin.price.update', $year[0]->id) }}">
            @csrf
            @method('PATCH')
                <label class="formLabel">Abonnement annuel</label>
                <input class="formInput" type="number" step="0.01" name="price" value="{{$year[0]->price}}">
                <button class="buttonAdmin" type="submit">Modifier</button>
            </form>
            <form class="formItem" method="post" action="{{ route('admin.price.update', $week[0]->id) }}">
            @csrf
            @method('PATCH')
                <label class="formLabel">Bandeau publicitaire : Une semaine</label>
                <input class="formInput" type="number" step="0.01" name="price" value="{{$week[0]->price}}">
                <button class="buttonAdmin" type="submit">Modifier</button>
            </form>
            <form class="formItem" method="post" action="{{ route('admin.price.update', $twoweek[0]->id) }}">
            @csrf
            @method('PATCH')
                <label class="formLabel">Bandeau publicitaire : Deux semaines</label>
                <input class="formInput" type="number" step="0.01" name="price" value="{{$twoweek[0]->price}}">
                <button class="buttonAdmin" type="submit">Modifier</button>
            </form>
            <form class="formItem" method="post" action="{{ route('admin.price.update', $month[0]->id) }}">
            @csrf
            @method('PATCH')
                <label class="formLabel">Bandeau publicitaire : Un mois</label>
                <input class="formInput" type="number" step="0.01" name="price" value="{{$month[0]->price}}">
                <button class="buttonAdmin" type="submit">Modifier</button>
            </form>
        </div>
    </section>
@endsection