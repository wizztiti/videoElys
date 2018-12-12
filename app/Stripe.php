<?php

namespace App;

use App\Exceptions\StripeException;
use Stripe\Error\InvalidRequest;

class Stripe
{
    public function charge($token, $amount)
    {

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        try {
            $charge = \Stripe\Charge::create([
                "amount" => $amount,
                "currency" => "eur",
                "source" => "$token", // obtained with Stripe.js
            ]);

            return $charge->source->last4;
        } catch(InvalidRequest $e) {
            throw new StripeException;
        }

    }
}
