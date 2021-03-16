<footer>
    <hr>
    <div class="socialContainer">
        <strong>Retrouvez nous sur les réseaux sociaux</strong>
        <a href="#" class="socialLink facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="socialLink twitter"><i class="fab fa-twitter"></i></a>
        <a href="#" class="socialLink instagram"><i class="fab fa-instagram"></i></a>
        <a href="#" class="socialLink linkedin"><i class="fab fa-linkedin-in"></i></a>
    </div>
    <hr>
    <div class="linkContainer">
        <div class="linkItem">
            <ul>
                <li><strong>Nos services</strong></li>
                <li><a href="{{ route('services') }}">Services</a></li>
                <li><a href="{{ route('artisans') }}">Artisans</a></li>
                <li><a href="{{ route('housings') }}">Logement</a></li>
            </ul>
        </div>
        <div class="linkItem">
            <ul>
                <li><a href="{{ route('become-provider') }}">Devenir prestataires</a></li>
                @if(!App\Models\User::auth())
                    <li><a href="{{ route('show.login') }}">Connexion</a></li>
                @endif
                @if(App\Models\User::auth() && App\Models\User::admin())
                    <li><a href="{{ route('admin') }}">Administration</a></li>
                @elseif(App\Models\User::auth())
                    <li><a href="{{ route('member-area') }}">Espace membre</a></li>
                @endif
                @if(App\Models\User::auth())
                    <li><a href="{{ route('logout') }}">Déconnexion</a></li>
                @endif
            </ul>
        </div>
        <div class="linkItem">
            <ul>
                <li><strong>Informations légales</strong></li>
                <li><a href="">Politique de confidentialité</a></li>
                <li><a href="">Mentions légales</a></li>
                <li>© Atouts services à tout âges 2021</li>
            </ul>
        </div>
    </div>
</footer>