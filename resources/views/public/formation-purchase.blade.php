@extends('layouts.app')

@section('content')
    <div class="formation-purchase">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{ route('formation.payment') }}" method="post" id="payment-form">
                    @csrf
                    <div class="card">
                        <div class="card-header">Adresse facturation</div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="form-group">
                                    {!!
                                        Form::text('firstname', $user->firstname , [
                                            'class' => 'form-control',
                                            'placeholder' => 'Nombre',
                                        ])
                                    !!}
                                    {!! $errors->first('firstname', '<span class="help-block">:message</span>') !!}
                                </div>

                                <div class="form-group">
                                    {!!
                                        Form::text('lastname', $user->lastname, [
                                            'class' => 'form-control',
                                            'placeholder' => 'Apellido',
                                        ])
                                    !!}
                                    {!! $errors->first('lastname', '<span class="help-block">:message</span>') !!}
                                </div>

                                <div class="form-group">
                                    {!!
                                        Form::text('address', $user->address, [
                                            'class' => 'form-control',
                                            'placeholder' => 'Direcion',
                                        ])
                                    !!}
                                    {!! $errors->first('address', '<span class="help-block">:message</span>') !!}
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        {!!
                                            Form::number('postal_code', $user->postal_code, [
                                                'class' => 'form-control',
                                                'placeholder' => 'Codigo postal',
                                            ])
                                        !!}
                                        {!! $errors->first('postal_code', '<span class="help-block">:message</span>') !!}
                                    </div>

                                    <div class="form-group col-md-6">
                                        {!!
                                            Form::text('city', $user->city, [
                                                'class' => 'form-control',
                                                'placeholder' => 'Ciudad',
                                            ])
                                        !!}
                                        {!! $errors->first('city', '<span class="help-block">:message</span>') !!}
                                    </div>

                                </div>

                                <div class="form-group">
                                    {!!
                                        Form::text('country', $user->country, [
                                            'class' => 'form-control',
                                            'placeholder' => 'Pais',
                                        ])
                                    !!}
                                    {!! $errors->first('country', '<span class="help-block">:message</span>') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header">Buy formation : {{ $formation->title }}</div>
                        <div class="card-body">
                            <input type="hidden" name="formationID" value="{{ $formation->id }}">
                            <div class="form-group">
                                <label for="card-element">
                                    Credit or debit card
                                </label>
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>

                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>

                            <button class="btn btn-moutarde" type="submit">Pay €{{ $formation->price }} </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Create a Stripe client.
        var stripe = Stripe('{{config('services.stripe.key')}}');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script>
@endsection

@push('javascript-libs')
    <script src="https://js.stripe.com/v3/"></script>
@endpush
