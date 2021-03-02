<nav>
    <div class="itemNav">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
    </div>
    <div class="itemNav">
        <a href="javascript:void(0);" class="iconNav" onclick="showNavBar()">
            <i class="fa fa-bars"></i>
        </a>
        <a class="buttonNav" href="{{ route('home') }}">Accueil</a>
        <a class="buttonNav" href="{{ route('services') }}">Services</a>
        <a class="buttonNav" href="{{ route('artisans') }}">Artisans</a>
        <a class="buttonNav" href="{{ route('housings') }}">Logement</a>
        <a class="buttonNav" href="{{ route('become-provider') }}">Devenir prestataires</a>
        @if(!App\Models\User::auth())
            <a class="buttonNav" href="{{ route('show.login') }}">Connexion</a>
        @endif
        @if(App\Models\User::auth())
            <a class="buttonNav" href="{{ route('member-area') }}">Espace membre</a>
            <a class="buttonNav" href="{{ route('logout') }}">Déconnexion</a>
        @endif
    </div>
</nav>