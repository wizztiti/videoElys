<?php

namespace Tests\Unit;

use App\Stripe;
use App\StripeFake;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StripeFakeTest extends StripeTest
{
    public function setUp()
    {
        parent::setUp();
        app()->instance(Stripe::class, new StripeFake());
    }
}
