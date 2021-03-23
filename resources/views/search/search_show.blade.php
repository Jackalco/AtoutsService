@extends('layouts.master')

@section('head-title')
    Atouts Services - Devenir prestataire
@endsection

@section('head-meta-description')
    Devenez prestatataire chez Atouts Services
@endsection

@push('stylesheet')
    <link href="{{ asset('css/search.css') }}" rel="stylesheet">
    <link href="{{ asset('css/EasyAutocomplete/easy-autocomplete.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/EasyAutocomplete/easy-autocomplete.themes.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <section>
        <form action="{{ route('search.getsearch') }}" method="post" class="searchContainer">
            @csrf
            <div class="searchItem categories">
                <i class="fas fa-search"></i>
                <div class="searchDivInput">
                    <input class="searchInput" id="categories" name="category"  type="text" placeholder="Service..." value="{{old('name')}}">
                    @if ($errors->has('category'))
                        <div class="error">
                            Veuillez indiquer un service
                        </div>
                    @endif
                </div>      
            </div>
            <div class="searchItem cities">
                <i class="fas fa-map-marker-alt"></i>
                <div class="searchDivInput">
                    <input class="searchInput" id="cities" name="city" type="text" placeholder="Localisation..." value="{{old('city')}}">
                    @if ($errors->has('city'))
                        <div class="error">
                            Veuillez indiquer un lieu
                        </div>
                    @endif
                </div>
            </div>
            <button type="submit" class="searchButton">Rechercher</button>
        </form>
    </section>
@endsection

@push('script')
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/EasyAutocomplete/jquery.easy-autocomplete.min.js') }}"></script>
    <script src="{{ asset('js/searchCategoriesAutoComplete.js') }}"></script>
    <script src="{{ asset('js/searchCitiesAutoComplete.js') }}"></script>
@endpush