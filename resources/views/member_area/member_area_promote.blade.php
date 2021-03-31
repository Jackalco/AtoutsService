@extends('layouts.master')

@section('head-title')
    Atouts Services - Espace membre pour les prestataires
@endsection

@section('head-meta-description')
    Modification d'un prestataire d'Atouts Services par l'utilisateur propriétaire 
@endsection

@push('stylesheet')
    <link href="{{ asset('css/member_area.css') }}" rel="stylesheet">
    <link href="{{ asset('css/payment.css') }}" rel="stylesheet">
@endpush

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success text-center">
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif
        <form role="form" action="{{ route('payment', [$user->id, $provider->id]) }}" method="post" class="paymentContainer validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
            @csrf

            <div class="chooseContainer">
                <input type="radio" id="week" name="price" value="9999">
                <label for="week">Une semaine (99,99€)</label>
                <input type="radio" id="coupleWeek" name="price" value="19999">
                <label for="coupleWeek">2 semaines (199,99€)</label>
                <input type="radio" id="month" name="price" value="39999">
                <label for="month">Un mois (399,99€)</label>
            </div>
    
            <div class='paymentItem'>
                <input class='paymentName' type='text' placeholder="Nom du titulaire">
            </div>
    
            <div class='paymentItem'>
                <input autocomplete='off' class='form-control card-num' size='20' type='text' placeholder="Numéro">
                <input autocomplete='off' class='form-control card-cvc' size='4' type='text' placeholder="CVC">
                <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
            </div>
    
            <div class="paymentItem">
                <button class="paymentButton" type="submit">Payer</button>
            </div>

            <div class='hide error form-group'>
                <div class='alert-danger alert'>Remplissez vos informations banquaires</div>
            </div>
                            
        </form>
        <div>{{$date}}</div>
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
                .find('.alert')
                .text(response.error.message);
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