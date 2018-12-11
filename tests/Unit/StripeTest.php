<?php

namespace Tests\Unit;

use App\Exceptions\StripeException;
use App\Stripe;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StripeTest extends TestCase
{
    const LAST4 = [
        'tok_visa' => '4242',
    ];

    /** @test */
    public function it_works()
    {
        $stripe = app(Stripe::class);

        $last4 = $stripe->charge('tok_visa', 10 * 100);

        $this->assertEquals(self::LAST4['tok_visa'], $last4);
    }

    /** @test */
    public function it_doesn_t_works()
    {
        $stripe = app(Stripe::class);

        try {
            $stripe->charge('token_invalid', 10 * 100);
        } catch (StripeException $e) {
            $this->assertTrue(true);
            return;
        }

        $this->fail('Stripe succeeded');
    }
}
