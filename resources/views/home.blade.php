@extends('layouts.master')

@section('head-title')
    Atouts Services - Accueil
@endsection

@section('head-meta-description')
Atout Services et à tous âges est une association qui oeuvre pour la préservation des petites entreprises, valorisant les entreprises de proximité.
@endsection

@push('stylesheet')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/EasyAutocomplete/easy-autocomplete.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/EasyAutocomplete/easy-autocomplete.themes.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <form action="{{ route('search.getsearch') }}" method="post" class="searchContainer">
        @csrf
        <div class="searchItem categories">
            <i class="fas fa-search"></i>
            <div class="searchDivInput">
                <input class="searchInput" id="categories" name="category"  type="text" placeholder="Service..." value="{{old('category')}}">
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
    @if(count($promotes) > 0)
    <section class="slideshowContainer">
        <h2>N'hésitez pas à consulter nos prestataires mis en avant !</h2>
        <div class="slideContainer">
            @foreach($promotes as $key=>$promote)
            <div class="slideItem fade">
                <div class="numbertext">{{$key+1}} / {{count($promotes)}}</div>
                <img class="slideImage" src="{{ asset('storage/imagesUploaded/'.$promote->provider->image->path) }}">
                <a class="slideLayer" href="{{ route('provider.show', $promote->provider->id) }}">
                    <div class="slideTitle">{{$promote->provider->name}}</div>
                    <div class="slideText">{{$promote->provider->activity}} sur {{$promote->provider->city}}</div>
                </a>
            </div>
            @endforeach

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
    </section>
    @endif
    <section class="needContainer">
        <div class="needItem">Des artisans et des services de proximité pour vous aider</div>
        <div class="needItem">
            <a href="{{ route('search.show') }}">De quel service avez-vous besoin ?</a>
        </div>
        <div class="needItem"></div>
    </section>
    <section class="serviceContainer">
        <a class="serviceLayer" href="{{ route('services') }}">
            Services
        </a>
    </section>
    <section class="cardContainer">
        <div class="cardItem"><a class="cardLayer" href="{{ route('artisans') }}">Artisans</a></div>
        <div class="cardItem"><a class="cardLayer" href="{{ route('housings') }}">Logement</a></div>
    </section>
    <section class="howContainer">
        <h2>Comment ça marche ?</h2>
        <ol>
            <li><span class="circle"><i class="fas fa-comment"></i></span> Décrivez votre besoin et postez</li>
            <li><span class="circle"><i class="fas fa-hard-hat"></i></span>Les prestataires disponibles et compétents vous proposent leurs services</li>
            <li><span class="circle"><i class="fas fa-hands-helping"></i></span>Évaluez et réglez votre prestataire une fois le travail terminé</li>
        </ol>
    </section>
    <section class="discoverContainer">
        <h2>Découvrez nos services</h2>
        <div class="iconContainer">
            <div class="iconItem">
                <i class="fas fa-tools"></i>
                <i class="fas fa-broom"></i>
                <i class="fas fa-tree"></i>
            </div>
            <div class="iconItem">
                <i class="fas fa-wrench"></i>
                <i class="fas fa-blind"></i>
                <i class="fas fa-paw"></i>
            </div>
            <div class="iconItem">
                <i class="fas fa-user-graduate"></i>
                <i class="fas fa-desktop"></i>
                <i class="fas fa-tasks"></i>
            </div>
            <div class="iconItem">
                <i class="fas fa-truck"></i>
                <i class="fas fa-truck-loading"></i>
                <i class="fas fa-handshake"></i>
            </div>
        </div>
        <p>Atout Services et à tous âges est une association qui oeuvre pour la préservation des petites entreprises, valorisant les entreprises de proximité.</p>
        <p>Nos missions sont :</p>
        <ul>
            <li>Protéger les petites entreprises de service à la personne</li>
            <li>Développer l'attractivité, créer des emplois</li>
            <li>Protéger les béneficiaires en leur proposant des prestations de qualité</li>
        </ul>
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
    <script src="{{ asset('js/slide.js') }}"></script>
@endpush