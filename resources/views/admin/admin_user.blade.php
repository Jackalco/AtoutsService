@extends('layouts.master')

@section('head-title')
    Atouts Services - Gestion des utilisateurs
@endsection

@section('head-meta-description')
    Page gestion des utilisateurs d'Atouts Services
@endsection

@push('stylesheet')
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
@endpush

@section('content')
    <h1>Gestion des utilisateurs</h1>
    <h2>Liste des utilisateurs</h2>
    <div class="listContainer">
        @foreach($users as $user)
            <div class="listItem">
                <div class="listInfo">
                    <div><strong>Nom :</strong> {{$user->name}}</div>
                    <div><strong>Email :</strong> {{$user->email}}</div>
                </div>
                <div class="listAction">
                    <form method="post" action="{{ route('admin.user.delete', $user->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="buttonAdmin">Supprimer</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection