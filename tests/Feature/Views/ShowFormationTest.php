<?php

namespace Tests\Feature\Views;

use App\Models\Formation;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;

class ShowFormationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_show_a_formation()
    {
        //$this->withExceptionHandling();

        $category = factory(Category::class)->create();
        $formation = factory(Formation::class)->create();

        $response = $this->get(route('formation.show', [ 'category' => $category->slug, 'formation' => $formation->slug]));
        $formationResponse = $response->original->getData()['formation'];

        $this->assertTrue($formationResponse->is($formation));

        $response->assertSuccessful()
            ->assertViewIs('public.formation')
        ;
    }
}
