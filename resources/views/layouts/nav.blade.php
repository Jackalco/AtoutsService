<nav>
    <div class="itemNav">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
    </div>
    <div class="itemNav">
        <a href="{{ route('home') }}">Accueil</a>
        <a href="{{ route('services') }}">Services</a>
        <a href="">Artisans</a>
        <a href="">Logement</a>
        <a href="">Devenir prestataires</a>
        @if(!App\Models\User::auth())
            <a href="{{ route('show.login') }}">Connexion</a>
        @endif
        @if(App\Models\User::auth())
            <a href="{{ route('member-area') }}">Espace membre</a>
            <a href="{{ route('logout') }}">Déconnexion</a>
        @endif
    </div>
</nav>