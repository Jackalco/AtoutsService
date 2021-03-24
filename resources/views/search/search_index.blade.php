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
                <input class="searchInput" id="categories" name="category"  type="text" placeholder="Service..." value="{{old('name')?? $category}}">
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
                <input class="searchInput" id="cities" name="city" type="text" placeholder="Localisation..." value="{{old('city')?? $city}}">
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
    <section>
        @if(count($providers) == 0)
            <div>Désolé, il semble que nous n'ayons pas trouvé de résultat pour votre recherche.</div>
        @else
            <div class="listContainer">
                @foreach($providers as $provider)
                    <div class="listItem">
                        <img class="listImage" src="{{asset('storage/imagesUploaded/'.$provider->image->path)}}" alt="Logo de {{$provider->name}}">
                        <div class="listInfo">
                            <a class="listLink" href="{{ route('provider.show', $provider->id) }}">{{$provider->name}}</a>
                            <div>
                                {{$provider->address}},<br>
                                {{$provider->city}}
                            </div>
                        </div>
                        <div class="listScore">{{$provider->average()}} / 5</div>
                        
                    </div>
                @endforeach
            </div>
            
        @endif
    </section>  
@endsection

@push('script')
    <script type="text/javascript">
        var urlCategories = <?php echo $categories; ?>;
        var urlCities = '{{ asset('json/cities.json') }}';
    </script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/EasyAutocomplete/jquery.easy-autocomplete.min.js') }}"></script>
    <script src="{{ asset('js/searchCategoriesAutoComplete.js') }}"></script>
    <script src="{{ asset('js/searchCitiesAutoComplete.js') }}"></script>
@endpush