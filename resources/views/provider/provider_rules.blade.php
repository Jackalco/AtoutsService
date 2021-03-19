@extends('layouts.master')

@section('head-title')
    Atouts Services - Devenir prestataire
@endsection

@section('head-meta-description')
    Charte profesionnelle d'Atouts Services.
@endsection

@push('stylesheet')
    <link href="{{ asset('css/provider.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="rulesContainer">
        <h1>Charte profesionnelle</h1>
        <ol>
            <li>Utiliser un langage clair et précis</li>
            <li>Présentation d’un devis avant tout type de prise en charge.</li>
            <li>Le devis et la facture devra être claire :</li>
            <ul>
                <li>Il devrait comporter clairement tous les travaux ou le service apporté clairement et lisiblement.</li>
                <li>Le code TVA, numéro SIRET</li>
            </ul>
            <li>L’information du prix :</li>
            <ul>
                <li>Doit être claire et bien compris par l’usager.</li>
                <li>Pouvoir obtenir le prix en franc si y a une demande du bénéficiaire, celui-ci devra apparaître au crayon sur un document avec une signature du professionnel que le bénéficiaire devra garder.</li>
            </ul>
            <li>Laisser une carte de visite pour que l’usager puisse vous contacter facilement :</li>
            <ul>
                <li>Le nom et le numéro de téléphone devra être bien visible.</li>
            </ul>
            <li>Respecter les horaires de passage :</li>
            <ul>
                <li>Le passage devra se faire entre 9h-17h</li>
            </ul>
            <li>Respecter le temps de livraison :</li>
            <ul>
                <li>La date de livraison doit être informée, S’il y a une dérogation elle doit être justifiée.</li>
            </ul>
            <li>S’il y a un remplacement à faire, remplacer que ce qui a été stipulé sur le devis pour éviter les surprises de surcoût !</li>
            <ul>
                <li>S’il y a une modification de tâche à faire, bien informer la personne et lui reproposée un devis qu’elle doit signée.</li>
            </ul>
            <li>RESPECTER LA PERSONNE ET RESPECTER SON ENVIRONNEMENT :</li>
            <ul>
                <li>Respecter son mode de vie</li>
                <li>Interdiction de se déplacer dans un lieu autre que celui-ci ou se trouve l’intervention.</li>
            </ul>
            <li>PAS DE DEMARCHARGE ABUSIF.</li>
            <li>Obligation d’avoir une assurance casse et vole chez le client.</li>
            <li>Un numéro de Siret obligatoire, une responsabilité civile obligatoire.</li>
            <li>La confidentialité et le comportement professionnel :</li>
            <ul>
                <li>Vous n’avez pas à vous rendre chez un particulier sans le cadre professionnel</li>
            </ul>
            <li>Vos lieux et nom du bénéficiaire doivent être confidentiels.</li>
            <li>La facture devra être réglée tous les 05 du mois. Tout retard de paiement donnera droit à une indemnité pour frais de recouvrement s'élevant à 40€ ( loi, n° 2012-387 du 22 mars 2012). Le règlement sera annuelle, un prélèvement tous les 5 du mois en cas de non-respect.</li>
            <li>Si vous avez plus de 10 note négative sur le savoir être et le prix vous aurez 20% de plus sur votre annualisation.</li>
        </ol>
    
    </div>
@endsection