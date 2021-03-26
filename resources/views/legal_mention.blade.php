@extends('layouts.master')

@section('head-title')
    Atouts Services - Mentions légales
@endsection

@section('head-meta-description')
    Mentions légales concernant le site Atouts Services.
@endsection

@push('stylesheet')
    <link href="{{ asset('css/legal.css') }}" rel="stylesheet">
@endpush

@section('content')
    <h1>Mentions légales</h1>
    <section class="legalContainer">
        <div class="legalItem">
            <h2>Présentation</h2>
            <div><strong>Propriètaire :</strong> Atouts Services</div>
            <div><strong>Adresse :</strong> 257 bis Avenue de Mindin, 44250 Saint-Brevin-les-Pins</div>
            <div><strong>Numéro de SIREN :</strong> 82176895900016</div>
            <div><strong>Société :</strong> Association</div>
            <div><strong>Email :</strong></div>
            <div><strong>Téléphone :</strong></div>
            <div><strong>Webmaster :</strong> Vincent JACQUES</div>
            <div><strong>Hébergeur :</strong> <a href="https://www.o2switch.fr/" target="_blank">O2switch</a> – 224 BD GUSTAVE FLAUBERT 63000 CLERMONT FERRAND 04 44 44 60 40</div>
        </div>
        <div class="legalItem">
            <h2>Conditions générales d’utilisation</h2>
            <p>Le site est accessible gratuitement à tout internaute disposant d'un accès à internet.</p>
            <p>Le site constitue une œuvre de l’esprit protégée par les dispositions du Code de la Propriété Intellectuelle et des Réglementations Internationales applicables. Le client ne peut en aucune manière réutiliser, céder ou exploiter pour son propre compte tout ou partie des éléments ou travaux dusite.</p>
            <p>L’utilisation du site Atouts Services implique l’acceptation pleine et entière des conditions générales d’utilisation ci-après décrites. Ces conditions d’utilisation sont susceptibles d’être modifiées ou complétées à tout moment, les utilisateurs du site Atouts Services sont donc invités à les consulter de manière régulière.</p>
        </div>
        <div class="legalItem">
            <h2>Limitations de responsabilité</h2>
            <p>Atouts Services ne pourra être tenu responsable des dommages directs et indirects causés au matériel de l’utilisateur, lors de l’accès au site Atouts Services, et résultant soit de l’utilisation d’un matériel ne répondant pas aux spécifications indiquées, soit de l’apparition d’un bug ou d’une incompatibilité.</p>
            <p>Atouts Services ne pourra également être tenu responsable des dommages indirects (tels par exemple qu’une perte de marché ou perte d’une chance) consécutifs à l’utilisation du site Atouts Services</p>
        </div>
        <div class="legalItem">
            <h2>Limitations contractuelles sur les données techniques</h2>
            <p>Le site utilise la technologie HTML, CSS, JavaScript et Laravel.</p>
            <p>Le site Internet ne pourra être tenu responsable de dommages matériels liés à l’utilisation du site. De plus, l’utilisateur du site s’engage à accéder au site en utilisant un matériel récent, ne contenant pas de virus et avec un navigateur de dernière génération mis-à-jour.</p>
        </div>
        <div class="legalItem">
            <h2>Liens hypertextes</h2>
            <p>Le site Atouts Services contient un certain nombre de liens hypertextes vers d’autres sites. Cependant, Atouts Services n’a pas la possibilité de vérifier le contenu des sites ainsi visités, et n’assumera en conséquence aucune responsabilité de ce fait.</p>
        </div>
        <div class="legalItem">
            <h2>Droit applicable et attribution de juridiction</h2>
            <p>Tout litige en relation avec l’utilisation du site Atous Services est soumis au droit français. En dehors des cas où la loi ne le permet pas, il est fait attribution exclusive de juridiction aux tribunaux compétents de Saint-Brévin.</p>
        </div>
    </section>
@endsection