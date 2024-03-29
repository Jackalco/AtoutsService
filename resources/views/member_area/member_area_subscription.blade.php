@extends('layouts.master')

@section('head-title')
    Atouts Services - Payement
@endsection

@section('head-meta-description')
    Payement pour abonnement d'un prestataire Atouts Services
@endsection

@push('stylesheet')
    <link href="{{ asset('css/payment.css') }}" rel="stylesheet">
@endpush

@section('content')
    <h1>Abonnement annuel ({{$price[0]->price}}€)</h1>
    @if($provider->end_date < $today)
        <div class="infoPayment"><strong>Souscrire à un abonnement annuel permettra à ce prestataire d'être visible sur notre site.</strong></div>
        <form role="form" action="{{ route('subscription', $provider->id) }}" method="post" class="paymentContainer validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                @csrf
        
                <div class='paymentItem firstPart'>
                    <input class='paymentName' type='text' placeholder="Nom du titulaire">
                </div>
                <div class='paymentItem secondPart'>
                    <input class="paymentInput card-num" autocomplete='off' class='form-control card-num' size="20" type='text' placeholder="Numéro">
                    <input class="paymentInput card-cvc" autocomplete='off' class='form-control card-cvc' size='4' type='text' placeholder="CVC">
                    <input class='form-control card-expiry-month paymentInput' placeholder='MM' size='2' type='text'>
                    <input class='form-control card-expiry-year paymentInput' placeholder='AAAA' size='4' type='text'>
                </div>
        
                <div class="paymentItem thirdPart">
                    <button class="paymentButton" type="submit">Payer</button>
                </div>

                <div class='hide error form-group'>
                    <div class='alert-danger paymentInfo'>Remplissez vos informations banquaires</div>
                </div>
                                
            </form>
    @else
        <div class="paymentContainer">
            <div class="paymentInfo">Ce prestataire a déjà souscrit à un abonnement.</div>
            <div class="paymentInfo">Date de renouvellement : {{$provider->end_date}}</div>
        </div>  
    @endif
    <a class="linkButton" href="{{ route('member-area.providers.show') }}">Retour</a>
@endsection

@push('script')
    <script src="{{ asset('js/client.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script type="text/javascript">
        $(function() {
    var $form         = $(".validation");
  $('form.validation').bind('submit', function(e) {
    var $form         = $(".validation"),
        inputVal = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find(inputVal),
        $errorStatus = $form.find('div.error'),
        valid         = true;
        $errorStatus.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorStatus.removeClass('hide');
        e.preventDefault();
      }
    });
  
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-num').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeHandleResponse);
    }
  
  });
  
  function stripeHandleResponse(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert-danger')
                .text('Vous n\'avez pas rempli toutes les informations nécessaires ou ces dernières sont incorrectes');
        } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
  
});
    </script>
@endpush