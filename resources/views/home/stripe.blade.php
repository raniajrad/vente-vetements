<!DOCTYPE html>
<html lang="fr">
<head>
    <base href="/public">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Paiement |Vente de Vêtements</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />

    <style>
       body {
            background: white;
        }

        .credit-card-box {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #fa7ca6;
            border: none;
        }
        .btn-primary:hover {
            background-color: #e76395;
        }
    </style>
</head>
<body>

    <!-- Header -->
    @include('home.header')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Payer avec votre carte</h2>
                <p class="text-center"><strong>Total de votre commande: {{$totalprice}} DT</strong></p>

                <div class="credit-card-box">
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif

                    <form id="payment-form" method="POST" action="" class="require-validation" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}">
                        @csrf

                        <!-- Nom sur la carte -->
                        <div class="mb-3">
                            <label class="form-label">Nom sur la carte</label>
                            <input type="text" class="form-control" placeholder="Nom du titulaire" required>
                        </div>

                        <!-- Numéro de carte -->
                        <div class="mb-3">
                            <label class="form-label">Numéro de carte</label>
                            <input type="text" class="form-control card-number" placeholder="**** **** **** ****" autocomplete="off" required>
                        </div>

                        <div class="row">
                            <!-- CVC -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">CVC</label>
                                <input type="text" class="form-control card-cvc" placeholder="ex. 311" autocomplete="off" required>
                            </div>

                            <!-- Mois expiration -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Mois d'expiration</label>
                                <input type="text" class="form-control card-expiry-month" placeholder="MM" required>
                            </div>

                            <!-- Année expiration -->
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Année d'expiration</label>
                                <input type="text" class="form-control card-expiry-year" placeholder="YYYY" required>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg mt-3">Payer maintenant</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Pied de page -->
    <div class="text-center mt-5 mb-4">
        <p>© 2025 Tous droits réservés</p>
    </div>

    <!-- JS Dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://js.stripe.com/v2/"></script>

    <script>
        $(document).ready(function() {
            @if(session()->has('toastr'))
                toastr["{{ session('toastr')['type'] }}"]("{{ session('toastr')['message'] }}");
            @endif
        });

        $(function() {
            var $form = $(".require-validation");

            $('form.require-validation').bind('submit', function(e) {
                var inputSelector = ['input[type=text]'].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $(".error"),
                    valid = true;

                $errorMessage.addClass('d-none');
                $('.has-error').removeClass('has-error');

                $inputs.each(function(i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('d-none');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val()
                    }, stripeResponseHandler);
                }
            });

            function stripeResponseHandler(status, response) {
                if (response.error) {
                    toastr.error(response.error.message);
                } else {
                    var token = response.id;
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
        });
    </script>

</body>
</html>
