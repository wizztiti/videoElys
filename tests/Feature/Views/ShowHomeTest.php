<?php

namespace Tests\Feature\Views;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ShowHomeTest extends TestCase
{

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }


    public function test_show_homepage()
    {
        $this->get(route('home'))
            ->assertSuccessful();
    }
}
