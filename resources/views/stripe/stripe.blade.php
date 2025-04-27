<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stripe Payment Getway</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-6 m-auto">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="text-center text-white">Make payment</h3>
                    </div>
                    <form id="stripeForm" method="POST" action="{{ route('stripe.charge') }}">
                        @csrf
                        <div class="card-body">
                            <div class="my-1 d-flex justify-content-between">
                                <label class="form-label">Price</label>
                                <label class="form-label">200</label>
                            </div>
                            <div class="my-1 d-flex justify-content-between">
                                <label class="form-label">Shipping:</label>
                                <label class="form-label">20</label>
                            </div>
                            <div class="my-1 d-flex justify-content-between border-top">
                                <label class="form-label">Total</label>
                                <label class="form-label">220</label>
                                <input type="hidden" name="total" value="220">
                            </div>
                            <div class="my-1">
                                <label class="form-label">Card number</label>
                                <div id="card-element" class="form-control"></div>
                                <span class="text-danger" id="stripeError"></span>
                            </div>
                            <div class="mt-2">
                                <input class="btn btn-primary w-100" value="Pay now!" onclick="createToken()">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <!-- Stripe js -->
    <script src="https://js.stripe.com/basil/stripe.js"></script>
    <script>
        var stripe = Stripe('{{ env("STRIPE_KEY") }}');

        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');

        function createToken() {
            stripe.createToken(cardElement).then(function(result) {
                if (result.error) {
                    document.getElementById('stripeError').innerHTML = result.error.message;
                    // Show error in payment form
                    console.log(result.error.message);
                } else {
                    // Send token to server
                    var form = document.getElementById('stripeForm');
                    var hiddenInput = document.createElement('input');
                    hiddenInput.setAttribute('type', 'hidden');
                    hiddenInput.setAttribute('name', 'stripeToken');
                    hiddenInput.setAttribute('value', result.token.id);
                    form.appendChild(hiddenInput);
                    form.submit();
                }
            });
        }

    </script>
</body>
</html>
